<?php

namespace TARGOBANK\Providers\DataProvider\Installment;

use TARGOBANK\Helper\PaymentHelper;
use Plenty\Modules\Payment\Contracts\PaymentRepositoryContract;
use Plenty\Modules\Payment\Models\PaymentProperty;
use Plenty\Plugin\Templates\Twig;
use Plenty\Modules\Order\Models\Order;

class TARGOBANKInstallmentFinancingCosts
{
    /**
     * @param Twig $twig
     * @param PaymentHelper $paymentHelper
     * @param Order $order
     * @param PaymentRepositoryContract $paymentRepositoryContract
     * @return string
     */
    public function call(   Twig $twig,
                            PaymentHelper $paymentHelper,
                            PaymentRepositoryContract $paymentRepositoryContract,
                            $arg)
    {
        $order = $arg[0];
        if ($order instanceof Order)
        {
            $payments = $paymentRepositoryContract->getPaymentsByOrderId($order->id);

            $payment = $payments[0];

            $creditFinancing = json_decode($paymentHelper->getPaymentPropertyValue($payment, PaymentProperty::TYPE_PAYMENT_TEXT), true);

            if(!empty($creditFinancing) && is_array($creditFinancing))
            {
                return $twig->render('TARGOBANK::TARGOBANKInstallment.FinancingCosts', $creditFinancing);
            }
        }

        return '';
    }
}