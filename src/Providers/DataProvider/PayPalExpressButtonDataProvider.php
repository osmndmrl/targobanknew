<?php

namespace TARGOBANK\Providers\DataProvider;

use TARGOBANK\Services\PaymentService;
use Plenty\Modules\Frontend\Contracts\Checkout;
use Plenty\Plugin\Templates\Twig;

/**
 * Class TARGOBANKExpressButtonDataProvider
 * @package TARGOBANK\Providers
 */
class TARGOBANKExpressButtonDataProvider
{
    /**
     * @param Twig $twig
     * @param PaymentService $paymentService
     * @param Checkout $checkout
     * @param $args
     * @return string
     */
    public function call(   Twig            $twig,
                            PaymentService  $paymentService,
                            Checkout        $checkout,
                            $args)
    {
        $paymentService->loadCurrentSettings('targobank');
        /**
         * Check the allowed shipping countries
         */
        if(array_key_exists('shippingCountries', $paymentService->settings))
        {
            $shippingCountries = $paymentService->settings['shippingCountries'];
            if(is_array($shippingCountries) && in_array($checkout->getShippingCountryId(), $shippingCountries))
            {
                return $twig->render('TARGOBANK::TARGOBANKExpress.TARGOBANKExpressButton');
            }
        }

        return '';
    }
}