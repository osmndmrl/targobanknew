<?php

namespace TARGOBANK\Providers\DataProvider\Installment;

use TARGOBANK\Helper\PaymentHelper;
use Plenty\Modules\Frontend\Contracts\Checkout;
use Plenty\Plugin\Templates\Twig;

class TARGOBANKInstallmentPrepareButton
{
    /**
     * @param Twig $twig
     * @param PaymentHelper $paymentHelper
     * @param Checkout $checkout
     * @return string
     */
    public function call(   Twig $twig,
                            PaymentHelper $paymentHelper,
                            Checkout $checkout)
    {
        $installmentSelected = false;
        if($checkout->getPaymentMethodId() == $paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALINSTALLMENT))
        {
            $installmentSelected = true;
        }
        return $twig->render('TARGOBANK::TARGOBANKInstallment.PrepareButton', array('installmentSelected'=>$installmentSelected));
    }
}