<?php // strict

namespace TARGOBANK\Methods;

use TARGOBANK\Services\PaymentService;
use Plenty\Modules\Basket\Contracts\BasketRepositoryContract;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;
use Plenty\Plugin\ConfigRepository;
use Plenty\Modules\Frontend\Contracts\Checkout;
use Plenty\Plugin\Application;

/**
 * Class TARGOBANKPaymentMethod
 * @package TARGOBANK\Methods
 */
class TARGOBANKPaymentMethod extends PaymentMethodService
{
    /**
     * @var BasketRepositoryContract
     */
    private $basketRepo;

    /**
     * @var Checkout
     */
    private $checkout;

    /**
     * @var ConfigRepository
     */
    private $configRepo;

    /**
     * @var PaymentService
     */
    private $paymentService;

    /**
     * TARGOBANKExpressPaymentMethod constructor.
     *
     * @param BasketRepositoryContract $basketRepo
     * @param ConfigRepository $configRepo
     * @param Checkout $checkout
     * @param PaymentService $paymentService
     */
    public function __construct(BasketRepositoryContract    $basketRepo,
                                ConfigRepository            $configRepo,
                                Checkout                    $checkout,
                                PaymentService              $paymentService)
    {
        $this->basketRepo       = $basketRepo;
        $this->configRepo       = $configRepo;
        $this->checkout         = $checkout;
        $this->paymentService   = $paymentService;
        $this->paymentService->loadCurrentSettings('targobank');
    }

    /**
     * Check whether the plugin is active
     *
     * @return bool
     */
    public function isActive()
    {
        /**
         * Check the allowed shipping countries
         */
        if(!array_key_exists('payPalPlus',$this->paymentService->settings) || (array_key_exists('payPalPlus',$this->paymentService->settings) && $this->paymentService->settings['payPalPlus'] == 0) )
        {
            if(array_key_exists('shippingCountries', $this->paymentService->settings))
            {
                $shippingCountries = $this->paymentService->settings['shippingCountries'];
                if(is_array($shippingCountries) && in_array($this->checkout->getShippingCountryId(), $shippingCountries))
                {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Get the name of the plugin
     *
     * @return string
     */
    public function getName()
    {
        $name = '';
        $lang = 'de';
        if(array_key_exists('language', $this->paymentService->settings))
        {
            if(array_key_exists($lang, $this->paymentService->settings['language']))
            {
                if(array_key_exists('name', $this->paymentService->settings['language'][$lang]))
                {
                    $name = $this->paymentService->settings['language'][$lang]['name'];
                }
            }
        }

        if(!strlen($name))
        {
            $name = 'TARGOBANK';
        }

        return $name;
    }

    /**
     * Get additional costs for TARGOBANK.
     * TARGOBANK did not allow additional costs
     *
     * @return float
     */
    public function getFee()
    {
        return 0.00;
    }

    /**
     * Get the path of the icon
     *
     * @return string
     */
    public function getIcon()
    {
        $lang = 'de';
        if( array_key_exists('language', $this->paymentService->settings) &&
            array_key_exists($lang, $this->paymentService->settings['language']) &&
            array_key_exists('logo', $this->paymentService->settings['language'][$lang]))
        {
            switch ($this->paymentService->settings['language'][$lang]['logo'])
            {
                case 0:
                    break;
                case 1:
                    break;
                case 2:
                    break;
            }
        }
        /** @var Application $app */
        $app = pluginApp(Application::class);
        $icon = $app->getUrlPath('targobank').'/images/logos/de-pp-logo.png';

        return $icon;
    }

    /**
     * Get the description of the payment method. The description can be entered in the config.json.
     *
     * @return string
     */
    public function getDescription()
    {
        $desc = $this->configRepo->get('TARGOBANK.description');
        if(strlen($desc) <= 0)
        {
            $desc = '';
        }
        return $desc;
    }
    
    /**
     * Check if it is allowed to switch to this payment method
     *
     * @param int $orderId
     * @return bool
     */
    public function isSwitchableTo($orderId)
    {
        return false;
    }
    
    /**
     * Check if it is allowed to switch from this payment method
     *
     * @param int $orderId
     * @return bool
     */
    public function isSwitchableFrom($orderId)
    {
        return true;
    }
}
