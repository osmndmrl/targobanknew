<?php

use TARGOBANK\Api\WebhookEventType;

$apiContext = TARGOBANKHelper::getApiContext(  SdkRestApi::getParam('clientId', true),
                                            SdkRestApi::getParam('clientSecret', true),
                                            SdkRestApi::getParam('sandbox', true));

try
{
    $result = WebhookEventType::availableEventTypes($apiContext);
}
catch (TARGOBANK\Exception\PPConnectionException $ex)
{
    return json_decode($ex->getData());
}
catch (Exception $e)
{
    return json_decode($e->getData());
}

return $result;