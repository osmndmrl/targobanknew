<?php
use TARGOBANK\Api\Payment;
use TARGOBANK\Api\Patch;
use TARGOBANK\Api\PatchRequest;

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

$paymentId =  SdkRestApi::getParam('paymentId', true);
$result = false;

if(isset($paymentId))
{
    $createdPayment = Payment::get($paymentId, $apiContext);

    if($createdPayment instanceof Payment)
    {
        $patches = [];

        /**
         * Upadate Shipping Address
         */
        $address = SdkRestApi::getParam('shippingAddress');
        $country = SdkRestApi::getParam('country');


        $patchAddress = new Patch();
        $patchAddress->
            setOp('add')->
            setPath('/transactions/0/item_list/shipping_address')->
            setValue(json_decode('{
                                    "recipient_name": "'.$address['firstname'] . ' ' . $address['lastname'].'",
                                    "line1": "'.$address['street'] . ' ' . $address['houseNumber'].'",
                                    "city": "'.$address['town'].'",
                                    "postal_code": "'.$address['postalCode'].'",
                                    "country_code": "'.$country['isoCode2'].'"
                                }')
                    );
        $patches[] = $patchAddress;

        /**
         * Upadate Total Amount
         */
        $basket         = SdkRestApi::getParam('basket');


        $patchAmount = new Patch();
        $patchAmount->
            setOp('replace')->
            setPath('/transactions/0/amount')->
            setValue(json_decode('{
                                    "total": "'.$basket['basketAmount'].'",
                                    "currency": "'.$basket['currency'].'",
                                    "details": {
                                        "subtotal": "'.$basket['itemSum'].'",
                                        "shipping": "'.$basket['shippingAmount'].'",
                                        "tax":"0"
                                    }
                                }')
                    );

        $patches[] = $patchAmount;

        $patchRequest = new PatchRequest();
        $patchRequest->setPatches($patches);

        try
        {
            $result = $createdPayment->update($patchRequest, $apiContext);
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
}

if ($result == true)
{
    $result = json_decode(Payment::get($createdPayment->getId(), $apiContext));
}

return $result;