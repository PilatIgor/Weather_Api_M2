<?php

namespace Invade\OpenWeather\Model\ResourceModel\Weather;

use Invade\OpenWeather\Api\Data\WeatherInterface;
use Invade\OpenWeather\Model\Weather as Model;
use Invade\OpenWeather\Model\ResourceModel\Weather as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = WeatherInterface::ID;

    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
