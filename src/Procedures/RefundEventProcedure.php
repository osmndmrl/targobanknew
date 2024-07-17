<?php
namespace TARGOBANK\Procedures;

use Plenty\Modules\Order\Models\Order;
use Plenty\Modules\Payment\Models\Payment;
use Plenty\Modules\Payment\Models\PaymentProperty;
use Plenty\Modules\Payment\Contracts\PaymentRepositoryContract;
use Plenty\Modules\EventProcedures\Events\EventProceduresTriggered;

use TARGOBANK\Services\PaymentService;
use TARGOBANK\Helper\PaymentHelper;

/**
 * Class RefundEventProcedure
 * @package TARGOBANK\Procedures
 */
class RefundEventProcedure
{
    /**
     * @param EventProceduresTriggered $eventTriggered
     * @param PaymentService $paymentService
     * @param PaymentRepositoryContract $paymentContract
     * @param PaymentHelper $paymentHelper
     * @throws \Exception
     */
    public function run(EventProceduresTriggered $eventTriggered,
                        PaymentService $paymentService,
                        PaymentRepositoryContract $paymentContract,
                        PaymentHelper $paymentHelper)
    {
        /** @var Order $order */
        $order = $eventTriggered->getOrder();

        // only sales orders and credit notes are allowed order types to refund
        switch($order->typeId)
        {
            case 1: //sales order
                $orderId = $order->id;
                break;
            case 4: //credit note
                $originOrders = $order->originOrders;
                if(!$originOrders->isEmpty() && $originOrders->count() > 0)
                {
                    $originOrder = $originOrders->first();

                    if($originOrder instanceof Order)
                    {
                        if($originOrder->typeId == 1)
                        {
                            $orderId = $originOrder->id;
                        }
                        else
                        {
                            $originOriginOrders = $originOrder->originOrders;
                            if(is_array($originOriginOrders) && count($originOriginOrders) > 0)
                            {
                                $originOriginOrder = $originOriginOrders->first();
                                if($originOriginOrder instanceof Order)
                                {
                                    $orderId = $originOriginOrder->id;
                                }
                            }
                        }
                    }
                }
                break;
        }

        if(empty($orderId))
        {
            throw new \Exception('Refund TARGOBANK payment failed! The given order is invalid!');
        }

        /** @var Payment[] $payment */
        $payments = $paymentContract->getPaymentsByOrderId($orderId);

        /** @var Payment $payment */
        foreach($payments as $payment)
        {
            if($payment->mopId == $paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPAL)
            OR $payment->mopId == $paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALEXPRESS)
            OR $payment->mopId == $paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALPLUS)
            OR $payment->mopId == $paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALINSTALLMENT))
            {
                $saleId = (int)$paymentHelper->getPaymentPropertyValue($payment, PaymentProperty::TYPE_TRANSACTION_ID);

                if($saleId > 0)
                {
                    // refund the payment
                    $refundResult = $paymentService->refundPayment($saleId);

                    if($refundResult['error'])
                    {
                        throw new \Exception($refundResult['error_msg']);
                    }

                    if($refundResult['state'] == 'failed')
                    {
                        //TODO log the reason_code
                    }
                    else
                    {
                        $paymentData = [];
                        $paymentData['parentId'] = $payment->id;
                        $paymentData['type'] = 'debit';

                        // if the refund is pending, set the payment unaccountable
                        if($refundResult['state'] == 'pending')
                        {
                            $paymentData['unaccountable'] = 1;  //1 true 0 false
                        }

                        // get the sale details of the refunded payment
                        $saleDetails = $paymentService->getSaleDetails($saleId);

                        if(!isset($saleDetails['error']))
                        {
                            // create the new debit payment
                            /** @var Payment $debitPayment */
                            $debitPayment = $paymentHelper->createPlentyPayment($saleDetails, $paymentData);

                            // read the payment status of the refunded payment
                            $payment->status = $paymentHelper->mapStatus($saleDetails['state']);

                            // update the refunded payment
                            $paymentContract->updatePayment($payment);
                        }

                        if(isset($debitPayment) && $debitPayment instanceof Payment)
                        {
                            if($refundResult['state'] == 'completed')
                            {
                                // assign the new debit payment to the order
                                $paymentHelper->assignPlentyPaymentToPlentyOrder($debitPayment, $order->id);
                            }
                        }
                    }

                    unset($saleId);
                }
            }
        }
    }
}