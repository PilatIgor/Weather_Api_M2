<?php

namespace Invade\OpenWeather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Invade\OpenWeather\Api\Data\WeatherInterface;

class Weather extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('weather',WeatherInterface::ID);
    }
}
