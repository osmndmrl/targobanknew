<?php

use TARGOBANK\Api\Webhook;
use TARGOBANK\Api\WebhookEventType;

require_once __DIR__.'/TARGOBANKHelper.php';

$apiContext = TARGOBANKHelper::getApiContext(  SdkRestApi::getParam('clientId', true),
                                            SdkRestApi::getParam('clientSecret', true),
                                            SdkRestApi::getParam('sandbox', true));

$webhook = new Webhook();
$notificationUrl = SdkRestApi::getParam('notificationUrl', false);

if($notificationUrl)
{
    $webhook->setUrl($notificationUrl);

    $webhookEvents = SdkRestApi::getParam('webhookEvents', array());

    $webhookEventTypes = array();

    if(is_array($webhookEvents) && count($webhookEvents) > 0)
    {
        foreach ($webhookEvents as $event)
        {
            $webhookEventTypes[] = new WebhookEventType('
            {
                "name":"'.$event.'"
            }');
        }
    }

    $webhook->setEventTypes($webhookEventTypes);

    try
    {
        $webhook = $webhook->create($apiContext);
    }
    catch (TARGOBANK\Exception\PPConnectionException $ex)
    {
        return json_decode($ex->getData());
    }
    catch (Exception $e)
    {
        return json_decode($e->getData());
    }
}

return $webhook->toArray();