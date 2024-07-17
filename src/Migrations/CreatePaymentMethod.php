<?php

namespace TARGOBANK\Migrations;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;
use TARGOBANK\Helper\PaymentHelper;

/**
 * Migration to create payment mehtods
 *
 * Class CreatePaymentMethod
 * @package TARGOBANK\Migrations
 */
class CreatePaymentMethod
{
    /**
     * @var PaymentMethodRepositoryContract
     */
    private $paymentMethodRepositoryContract;

    /**
     * @var PaymentHelper
     */
    private $paymentHelper;

    /**
     * CreatePaymentMethod constructor.
     *
     * @param PaymentMethodRepositoryContract $paymentMethodRepositoryContract
     * @param PaymentHelper $paymentHelper
     */
    public function __construct(    PaymentMethodRepositoryContract $paymentMethodRepositoryContract,
                                    PaymentHelper $paymentHelper)
    {
        $this->paymentMethodRepositoryContract = $paymentMethodRepositoryContract;
        $this->paymentHelper = $paymentHelper;
    }

    /**
     * Run on plugin build
     *
     * Create Method of Payment ID for TARGOBANK and TARGOBANK Express if they don't exist
     */
    public function run()
    {
        // Check whether the ID of the TARGOBANK payment method has been created
        if($this->paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPAL) == 'no_paymentmethod_found')
        {
            $paymentMethodData = array( 'pluginKey' => 'plentyTARGOBANK',
                                        'paymentKey' => 'PAYPAL',
                                        'name' => 'TARGOBANK');

            $this->paymentMethodRepositoryContract->createPaymentMethod($paymentMethodData);
        }

        // Check whether the ID of the TARGOBANK Express payment method has been created
        if($this->paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALEXPRESS) == 'no_paymentmethod_found')
        {
            $paymentMethodData = array( 'pluginKey'   => 'plentyTARGOBANK',
                                        'paymentKey'  => 'PAYPALEXPRESS',
                                        'name'        => 'TARGOBANKExpress');

            $this->paymentMethodRepositoryContract->createPaymentMethod($paymentMethodData);
        }

        // Check whether the ID of the TARGOBANK Express payment method has been created
        if($this->paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALPLUS) == 'no_paymentmethod_found')
        {
            $paymentMethodData = array( 'pluginKey'   => 'plentyTARGOBANK',
                                        'paymentKey'  => 'PAYPALPLUS',
                                        'name'        => 'TARGOBANKPlus');

            $this->paymentMethodRepositoryContract->createPaymentMethod($paymentMethodData);
        }

        // Check whether the ID of the TARGOBANK Express payment method has been created
        if($this->paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALINSTALLMENT) == 'no_paymentmethod_found')
        {
            $paymentMethodData = array( 'pluginKey'   => 'plentyTARGOBANK',
                                        'paymentKey'  => 'PAYPALINSTALLMENT',
                                        'name'        => 'TARGOBANKInstallment');

            $this->paymentMethodRepositoryContract->createPaymentMethod($paymentMethodData);
        }
    }
}