<?php
use TARGOBANK\Api\Amount;
use TARGOBANK\Api\Refund;
use TARGOBANK\Api\RefundRequest;
use TARGOBANK\Api\Sale;

require_once __DIR__.'/TARGOBANKHelper.php';

/** @var \Paypal\Rest\ApiContext $apiContext */
$apiContext = TARGOBANKHelper::getApiContext(  SdkRestApi::getParam('clientId', true),
                                            SdkRestApi::getParam('clientSecret', true),
                                            SdkRestApi::getParam('sandbox', true));

$mode = SdkRestApi::getParam('mode', 'targobank');

switch ($mode)
{
    case 'installment':
        $apiContext->addRequestHeader('TARGOBANK-Partner-Attribution-Id', 'Plenty_Cart_Inst');
        break;
    case 'plus':
        $apiContext->addRequestHeader('TARGOBANK-Partner-Attribution-Id', 'Plenty_Cart_Plus_2');
        break;
    case 'targobank':
    case 'targobankexpress':
    default:
        $apiContext->addRequestHeader('TARGOBANK-Partner-Attribution-Id', 'Plenty_Cart_EC_2');
        break;
}

/** @var RefundRequest $refundRequest */
$refundRequest = new RefundRequest();

$payment = SdkRestApi::getParam('payment', null);

if(!is_null($payment))
{
    /** @var Amount $amount */
    $amount = new Amount();
    $amount ->setCurrency($payment['currency'])
            ->setTotal($payment['total']);

    $refundRequest->setAmount($amount);
}

/** @var Sale $sale */
$sale = new Sale();
$sale->setId(SdkRestApi::getParam('saleId'));

try
{
    /** @var Refund $refundedSale */
    $refundedSale = $sale->refundSale($refundRequest, $apiContext);
}
catch (TARGOBANK\Exception\PPConnectionException $ex)
{
    return json_decode($ex->getData());
}
catch (Exception $e)
{
    return json_decode($e->getData());
}

return $refundedSale->toArray();