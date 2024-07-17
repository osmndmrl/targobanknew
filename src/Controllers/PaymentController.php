<?php //strict

namespace TARGOBANK\Controllers;

use TARGOBANK\Services\TARGOBANKExpressService;
use TARGOBANK\Services\TARGOBANKInstallmentService;
use Plenty\Modules\Basket\Contracts\BasketRepositoryContract;
use Plenty\Modules\Frontend\Contracts\Checkout;
use Plenty\Modules\Basket\Models\Basket;
use Plenty\Plugin\ConfigRepository;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;

use TARGOBANK\Services\SessionStorageService;
use Paypal\Services\PaymentService;
use TARGOBANK\Helper\PaymentHelper;
use Plenty\Plugin\Templates\Twig;

/**
 * Class PaymentController
 * @package TARGOBANK\Controllers
 */
class PaymentController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var ConfigRepository
     */
    private $config;

    /**
     * @var PaymentHelper
     */
    private $paymentHelper;

    /**
     * @var PaymentService
     */
    private $paymentService;

    /**
     * @var BasketRepositoryContract
     */
    private $basketContract;

    /**
     * @var SessionStorageService
     */
    private $sessionStorage;

    /**
     * PaymentController constructor.
     *
     * @param Request $request
     * @param Response $response
     * @param ConfigRepository $config
     * @param PaymentHelper $paymentHelper
     * @param PaymentService $paymentService
     * @param BasketRepositoryContract $basketContract
     * @param SessionStorageService $sessionStorage
     */
    public function __construct(  Request $request,
                                  Response $response,
                                  ConfigRepository $config,
                                  PaymentHelper $paymentHelper,
                                  PaymentService $paymentService,
                                  BasketRepositoryContract $basketContract,
                                  SessionStorageService $sessionStorage)
    {
        $this->request          = $request;
        $this->response         = $response;
        $this->config           = $config;
        $this->paymentHelper    = $paymentHelper;
        $this->paymentService   = $paymentService;
        $this->basketContract   = $basketContract;
        $this->sessionStorage   = $sessionStorage;
    }

    /**
     * TARGOBANK redirects to this page if the payment could not be executed or other problems occurred
     */
    public function checkoutCancel($mode=PaymentHelper::MODE_PAYPAL)
    {
        // clear the TARGOBANK session values
        $this->sessionStorage->setSessionValue(SessionStorageService::PAYPAL_PAY_ID, null);
        $this->sessionStorage->setSessionValue(SessionStorageService::PAYPAL_PAYER_ID, null);
        $this->sessionStorage->setSessionValue(SessionStorageService::PAYPAL_INSTALLMENT_CHECK, null);

        // Redirects to the cancellation page. The URL can be entered in the config.json.
        return $this->response->redirectTo($this->config->get('TARGOBANK.cancelUrl'));
    }

    /**
     * TARGOBANK redirects to this page if the payment was executed correctly
     */
    public function checkoutSuccess($mode=PaymentHelper::MODE_PAYPAL)
    {
        // Get the TARGOBANK payment data from the request
        $paymentId    = $this->request->get('paymentId');
        $payerId      = $this->request->get('PayerID');

        // Get the TARGOBANK Pay ID from the session
        $ppPayId    = $this->sessionStorage->getSessionValue(SessionStorageService::PAYPAL_PAY_ID);

        // Check whether the Pay ID from the session is equal to the given Pay ID by TARGOBANK
        if($paymentId != $ppPayId)
        {
            return $this->checkoutCancel();
        }

        $this->sessionStorage->setSessionValue(SessionStorageService::PAYPAL_PAYER_ID, $payerId);

        // update or create a contact
        $this->paymentService->handleTARGOBANKCustomer($paymentId, $mode);

        // Redirect to the success page. The URL can be entered in the config.json.
        return $this->response->redirectTo('place-order');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function prepareInstallment()
    {
        // Get the TARGOBANK payment data from the request
        $paymentId    = $this->request->get('paymentId');
        $payerId      = $this->request->get('PayerID');

        // Get the TARGOBANK Pay ID from the session
        $ppPayId    = $this->sessionStorage->getSessionValue(SessionStorageService::PAYPAL_PAY_ID);

        // Check whether the Pay ID from the session is equal to the given Pay ID by TARGOBANK
        if($paymentId != $ppPayId)
        {
            return $this->checkoutCancel();
        }

        $this->sessionStorage->setSessionValue(SessionStorageService::PAYPAL_PAYER_ID, $payerId);
        $this->sessionStorage->setSessionValue(SessionStorageService::PAYPAL_INSTALLMENT_CHECK, 1);

        // Get the offered finacing costs
        /** @var TARGOBANKInstallmentService $payPalInstallmentService */
        $payPalInstallmentService = pluginApp(\TARGOBANK\Services\TARGOBANKInstallmentService::class);
        $creditFinancingOffered = $payPalInstallmentService->getFinancingCosts($paymentId, PaymentHelper::MODE_PAYPAL_INSTALLMENT);
        $this->sessionStorage->setSessionValue(SessionStorageService::PAYPAL_INSTALLMENT_COSTS, $creditFinancingOffered);

        // Redirect to the success page. The URL can be entered in the config.json.
        return $this->response->redirectTo('checkout');
    }

    /**
     * TARGOBANK redirects to this page if the express payment could not be executed or other problems occurred
     */
    public function expressCheckoutCancel()
    {
        return $this->checkoutCancel();
    }

    /**
     * TARGOBANK redirects to this page if the express payment was executed correctly
     */
    public function expressCheckoutSuccess()
    {
        return $this->checkoutSuccess();
    }

    /**
     * Redirect to TARGOBANK Express Checkout
     */
    public function expressCheckout()
    {
        /** @var Basket $basket */
        $basket = $this->basketContract->load();

        /** @var Checkout $checkout */
        $checkout = pluginApp(\Plenty\Modules\Frontend\Contracts\Checkout::class);

        if($checkout instanceof Checkout)
        {
            $paymentMethodId = $this->paymentHelper->getTARGOBANKMopIdByPaymentKey(PaymentHelper::PAYMENTKEY_PAYPALEXPRESS);
            if($paymentMethodId > 0)
            {
                $checkout->setPaymentMethodId((int)$paymentMethodId);
            }
        }

        // get the targobank-express redirect URL
        /** @var TARGOBANKExpressService $payPalExpressService */
        $payPalExpressService = pluginApp(\TARGOBANK\Services\TARGOBANKExpressService::class);
        $redirectURL = $payPalExpressService->prepareTARGOBANKExpressPayment($basket);

        return $this->response->redirectTo($redirectURL);
    }

    /**
     * Change the payment method in the basket when user select a none targobank plus method
     *
     * @param Checkout $checkout
     * @param Request $request
     */
    public function changePaymentMethod(Checkout $checkout, Request $request)
    {
        $paymentMethod = $request->get('paymentMethod');
        if(isset($paymentMethod) && $paymentMethod > 0)
        {
            $checkout->setPaymentMethodId($paymentMethod);
        }
    }

    /**
     * @param TARGOBANKInstallmentService $payPalInstallmentService
     * @param Twig $twig
     * @param $amount
     *
     * @return string
     */
    public function calculateFinancingOptions(TARGOBANKInstallmentService $payPalInstallmentService, Twig $twig, $amount)
    {
        return $payPalInstallmentService->calculateFinancingCosts($twig, $amount);
    }
}
