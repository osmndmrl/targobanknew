<?php
use TARGOBANK\Api\Amount;
use TARGOBANK\Api\Details;
use TARGOBANK\Api\Payment;
use TARGOBANK\Api\PaymentExecution;
use TARGOBANK\Api\Transaction;

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

$paymentId = SdkRestApi::getParam('payId');

/** @var Payment $payment */
$payment = Payment::get($paymentId, $apiContext);

/** @var PaymentExecution $execution */
$execution = new PaymentExecution();

if(is_null(SdkRestApi::getParam('payerId')))
{
    $payer = $payment->getPayer()->getPayerInfo()->getPayerId();
}
else
{
    $payer = SdkRestApi::getParam('payerId');
}

$execution->setPayerId($payer);

try
{
    $result = $payment->execute($execution, $apiContext);
}
catch (TARGOBANK\Exception\PPConnectionException $ex)
{
    return json_decode($ex->getData());
}
catch (Exception $e)
{
    return json_decode($e->getData());
}

try
{
    /** @var Payment $paidPayment */
    $paidPayment = Payment::get($paymentId, $apiContext);
}
catch (TARGOBANK\Exception\PPConnectionException $ex)
{
    return json_decode($ex->getData());
}
catch (Exception $e)
{
    return json_decode($e->getData());
}

return $paidPayment->toArray();

