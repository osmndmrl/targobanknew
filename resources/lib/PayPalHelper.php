<?php
use TARGOBANK\Auth\OAuthTokenCredential;
use TARGOBANK\Rest\ApiContext;
use TARGOBANK\Api\InputFields;
use TARGOBANK\Api\WebProfile;
use TARGOBANK\Api\Presentation;
use TARGOBANK\Api\Payment;

class TARGOBANKHelper
{
    /**
     * Creates the ApiContext with the given params
     *
     * @param string $clientId Client ID
     * @param string $clientSecret Client Secret
     * @param bool $sandbox
     * @return TARGOBANK\Rest\ApiContext
     */
    static function getApiContext($clientId, $clientSecret, $sandbox = true)
    {
        if($sandbox)
        {
            $mode = 'sandbox';
        }
        else
        {
            $mode = 'live';
        }

        /** @var ApiContext $apiContext */
        $apiContext = new ApiContext(
            new OAuthTokenCredential(   $clientId,
                                        $clientSecret));

        $apiContext->setConfig(
            array(  'mode'              => $mode,
                    'log.LogEnabled'    => false,
                    'cache.enabled'     => false,
                    'http.CURLOPT_CONNECTTIMEOUT' => 30));

        return $apiContext;
    }
}
