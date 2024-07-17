<?php

namespace TARGOBANK\Services;


use Plenty\Modules\Plugin\Libs\Contracts\LibraryCallContract;

class LibService
{
    /**
     * @var LibraryCallContract
     */
    private $libraryCall;

    /**
     * LibService constructor.
     * @param LibraryCallContract $libraryCallContract
     */
    public function __construct(LibraryCallContract $libraryCallContract)
    {
        $this->libraryCall = $libraryCallContract;
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libPreparePayment($params)
    {
        return $this->executeLibCall('TARGOBANK::preparePayment', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libExecutePayment($params)
    {
        return $this->executeLibCall('TARGOBANK::executePayment', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libUpdatePayment($params)
    {
        return $this->executeLibCall('TARGOBANK::updatePayment', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libGetPaymentDetails($params)
    {
        return $this->executeLibCall('TARGOBANK::getPaymentDetails', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libGetSaleDetails($params)
    {
        return $this->executeLibCall('TARGOBANK::getSaleDetails', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libRefundPayment($params)
    {
        return $this->executeLibCall('TARGOBANK::refundPayment', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libListAvailableWebhooks($params)
    {
        return $this->executeLibCall('TARGOBANK::listAvailableWebhooks', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libCreateWebProfile($params)
    {
        return $this->executeLibCall('TARGOBANK::createWebProfile', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libCalculateFinancingOptions($params)
    {
        return $this->executeLibCall('TARGOBANK::calculatedFinancingOptions', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libCreateWebhook($params)
    {
        return $this->executeLibCall('TARGOBANK::createWebhook', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libDeleteWebhook($params)
    {
        return $this->executeLibCall('TARGOBANK::deleteWebhook', $params);
    }

    /**
     * execute the lib call
     *
     * @param $params
     * @return array
     */
    public function libValidateNotification($params)
    {
        return $this->executeLibCall('TARGOBANK::validateNotification', $params);
    }

    /**
     * Call the given libCall
     *
     * @param $libCall
     * @param $params
     * @return array
     */
    private function executeLibCall($libCall, $params)
    {
        return $this->libraryCall->call($libCall, $params);
    }
}