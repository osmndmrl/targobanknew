<?php
use \TARGOBANK\Api\VerifyWebhookSignature;
use \TARGOBANK\Api\WebhookEvent;

require_once __DIR__.'/TARGOBANKHelper.php';

/** @var \Paypal\Rest\ApiContext $apiContext */
$apiContext = TARGOBANKHelper::getApiContext(  SdkRestApi::getParam('clientId', true),
                                            SdkRestApi::getParam('clientSecret', true),
                                            SdkRestApi::getParam('sandbox', true));

$body = SdkRestApi::getParam('body');

$webhookEvent = new WebhookEvent();
$webhookEvent->fromJson($body);

$headers = SdkRestApi::getParam('headers');

$headers = array_change_key_case($headers, CASE_UPPER);

$signatureVerification = new VerifyWebhookSignature();
$signatureVerification->setAuthAlgo($headers['PAYPAL-AUTH-ALGO']);
$signatureVerification->setTransmissionId($headers['PAYPAL-TRANSMISSION-ID']);
$signatureVerification->setCertUrl($headers['PAYPAL-CERT-URL']);
$signatureVerification->setWebhookId(SdkRestApi::getParam('webhookId'));
$signatureVerification->setTransmissionSig($headers['PAYPAL-TRANSMISSION-SIG']);
$signatureVerification->setTransmissionTime($headers['PAYPAL-TRANSMISSION-TIME']);
$signatureVerification->setWebhookEvent($webhookEvent);

try
{
    /** @var \TARGOBANK\Api\VerifyWebhookSignatureResponse $output */
    $response = $signatureVerification->post($apiContext);
}
catch (TARGOBANK\Exception\PPConnectionException $ex)
{
    return json_decode($ex->getData());
}
catch (Exception $e)
{
    return json_decode($e->getData());
}

return $response->toArray();