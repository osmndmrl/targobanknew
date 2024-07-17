<?php

namespace TARGOBANK\Providers\DataProvider;

use TARGOBANK\Services\PaymentService;
use TARGOBANK\Services\TARGOBANKPlusService;
use Plenty\Modules\Frontend\Contracts\Checkout;
use Plenty\Modules\Order\Shipping\Countries\Contracts\CountryRepositoryContract;
use Plenty\Plugin\Templates\Twig;
use Plenty\Modules\Basket\Contracts\BasketRepositoryContract;

class TARGOBANKPlusPaymentWallDataProvider
{
    /**
     * @param Twig $twig
     * @param BasketRepositoryContract  $basketRepositoryContract
     * @param TARGOBANKPlusService         $targobankPlusService
     * @param PaymentService            $paymentService
     * @param Checkout                  $checkout
     * @param CountryRepositoryContract $countryRepositoryContract
     * @return string
     */
    public function call(   Twig                        $twig,
                            BasketRepositoryContract    $basketRepositoryContract,
                            TARGOBANKPlusService           $targobankPlusService,
                            PaymentService              $paymentService,
                            Checkout                    $checkout,
                            CountryRepositoryContract   $countryRepositoryContract)
    {
        $content = '';
        $paymentService->loadCurrentSettings('targobank');

        if(array_key_exists('payPalPlus',$paymentService->settings) && $paymentService->settings['payPalPlus'] == 1)
        {
            $content = $targobankPlusService->getPaymentWallContent($basketRepositoryContract->load(), $checkout, $countryRepositoryContract);
        }

        return $twig->render('TARGOBANK::TARGOBANKPlus.TARGOBANKPlusWall', ['content'=>$content]);
    }
}