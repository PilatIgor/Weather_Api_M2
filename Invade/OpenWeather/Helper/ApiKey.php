<?php

namespace Invade\OpenWeather\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ApiKey extends AbstractHelper
{
    /**
     * path to api key from stores->configuration
     */
    const API_KEY = "openweather/general/api_key";

    /**
     * @var ScopeConfigInterface
     */
    public $scopeConfig;

    /**
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->scopeConfig->getValue(self::API_KEY,ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return 'https://api.openweathermap.org/data/2.5';
    }

}
