<?php
namespace Codilar\Zipcode\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Configuration
{
    const ZIPCODE_MODULE_STATUS='zipcode/general/enable';
    const ZIPCODE_SUCCESS_MESSAGE='zipcode/general/availability_message';
    const ZIPCODE_ERROR_MESSAGE='zipcode/general/unavailability_message';
    private $config;
    public function __construct(
        ScopeConfigInterface $config
    ) {
        $this->config = $config;
    }
    public function getModuleStatus()
    {
        return !!$this->config->getValue(self::ZIPCODE_MODULE_STATUS);
    }
    public function getSuccessMessage()
    {
        return !!$this->config->getValue(self::ZIPCODE_SUCCESS_MESSAGE);
    }
    public function getErrorMessage()
    {
        return !!$this->config->getValue(self::ZIPCODE_ERROR_MESSAGE);
    }
}
