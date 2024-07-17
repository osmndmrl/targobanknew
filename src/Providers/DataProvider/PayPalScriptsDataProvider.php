<?php
/**
 * Created by IntelliJ IDEA.
 * User: jkonopka
 * Date: 07.03.17
 * Time: 13:03
 */

namespace TARGOBANK\Providers\DataProvider;


use TARGOBANK\Helper\PaymentHelper;
use Plenty\Plugin\Templates\Twig;

class TARGOBANKScriptsDataProvider
{
    public function call(Twig $twig, PaymentHelper $paymentHelper)
    {
        return $twig->render('TARGOBANK::TARGOBANKScripts', ['installmentPaymentMethodId'=>$paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALINSTALLMENT)]);
    }
}