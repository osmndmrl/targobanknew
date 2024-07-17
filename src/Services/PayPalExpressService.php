<?php

namespace TARGOBANK\Services;

use TARGOBANK\Helper\PaymentHelper;
use Plenty\Modules\Basket\Models\Basket;

class TARGOBANKExpressService extends PaymentService
{
    /**
     * @param Basket $basket
     * @return string
     */
    public function prepareTARGOBANKExpressPayment(Basket $basket)
    {
        $paymentContent = $this->getPaymentContent($basket, PaymentHelper::MODE_PAYPALEXPRESS);

        $preparePaymentResult = $this->getReturnType();

        if($preparePaymentResult == 'errorCode')
        {
            return '/basket';
        }
        elseif($preparePaymentResult == 'redirectUrl')
        {
            return $paymentContent;
        }
    }

}