<?php // strict

namespace TARGOBANK\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;
use Plenty\Plugin\Routing\ApiRouter;

/**
 * Class TARGOBANKRouteServiceProvider
 * @package TARGOBANK\Providers
 */
class TARGOBANKRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param Router $router
     * @param ApiRouter $apiRouter
     */
    public function map(Router $router, ApiRouter $apiRouter)
    {
        // TARGOBANK-Settings routes
        $apiRouter->version(['v1'], ['namespace' => 'TARGOBANK\Controllers', 'middleware' => 'oauth'],
            function ($apiRouter)
            {
                $apiRouter->post('payment/payPal/settings/', 'SettingsController@saveSettings');
                $apiRouter->get('payment/payPal/settings/{settingType}', 'SettingsController@loadSettings');
                $apiRouter->get('payment/payPal/setting/{webstore}', 'SettingsController@loadSetting');

                $apiRouter->get('payment/payPal/account/{accountId}', 'SettingsController@loadAccount');
                $apiRouter->get('payment/payPal/accounts/', 'SettingsController@loadAccounts');
                $apiRouter->post('payment/payPal/account/', 'SettingsController@createAccount');
                $apiRouter->put('payment/payPal/account/', 'SettingsController@updateAccount');
                $apiRouter->delete('payment/payPal/account/', 'SettingsController@deleteAccount');
            });

        // Get the TARGOBANK success and cancellation URLs
        $router->get('payment/payPal/checkoutSuccess/{mode}', 'TARGOBANK\Controllers\PaymentController@checkoutSuccess');
        $router->get('payment/payPal/checkoutCancel/{mode}' , 'TARGOBANK\Controllers\PaymentController@checkoutCancel');

        // Get the TARGOBANKExpress success and cancellation URLs
        $router->get('payment/payPal/expressCheckoutSuccess', 'TARGOBANK\Controllers\PaymentController@expressCheckoutSuccess');
        $router->get('payment/payPal/expressCheckoutCancel' , 'TARGOBANK\Controllers\PaymentController@expressCheckoutCancel');

        // Get the TARGOBANKExpress checkout
        $router->get('payment/payPal/expressCheckout', 'TARGOBANK\Controllers\PaymentController@expressCheckout');

        // TARGOBANK Webhook handler
        $router->post('payment/payPal/notification', 'TARGOBANK\Controllers\PaymentNotificationController@handleNotification');

        // Routes for the TARGOBANK Plus Wall and Checkout
        $router->post('payment/payPalPlus/changePaymentMethod/', 'TARGOBANK\Controllers\PaymentController@changePaymentMethod');

        // Routes for the TARGOBANK Installment
        $router->get('payment/payPalInstallment/financingOptions/{amount}', 'TARGOBANK\Controllers\PaymentController@calculateFinancingOptions');
        $router->get('payment/payPalInstallment/prepareInstallment', 'TARGOBANK\Controllers\PaymentController@prepareInstallment');
    }
}
