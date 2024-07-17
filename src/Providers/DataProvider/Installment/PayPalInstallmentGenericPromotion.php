<?php

namespace TARGOBANK\Providers\DataProvider\Installment;

use Plenty\Plugin\Templates\Twig;

class TARGOBANKInstallmentGenericPromotion
{
    public function call(Twig $twig)
    {
        return $twig->render('TARGOBANK::TARGOBANKInstallment.GenericPromotion');
    }
}