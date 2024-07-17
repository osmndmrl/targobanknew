<?php

use TARGOBANK\Api\Webhook;
use TARGOBANK\Api\WebhookList;
use TARGOBANK\Api\WebhookEventType;

require_once __DIR__.'/TARGOBANKHelper.php';

$apiContext = TARGOBANKHelper::getApiContext(  SdkRestApi::getParam('clientId', true),
                                            SdkRestApi::getParam('clientSecret', true),
                                            SdkRestApi::getParam('sandbox', true));

try
{
    $webhookList = \TARGOBANK\Api\Webhook::getAll($apiContext);
}
catch(Exception $ex)
{
    return false;
}

if($webhookList instanceof TARGOBANK\Api\WebhookList)
{
    try
    {
        foreach ($webhookList->getWebhooks() as $webhook)
        {
            $webhook->delete($apiContext);
        }
    }
    catch(Exception $ex)
    {
        return false;
    }
}

return true;