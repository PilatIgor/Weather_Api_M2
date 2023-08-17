<?php

namespace Invade\OpenWeather\Model;

use Invade\OpenWeather\Api\Data\WeatherInterface;
use Invade\OpenWeather\Api\WeatherRepositoryInterface;
use Invade\OpenWeather\Model\ResourceModel\Weather\CollectionFactory;
use Invade\OpenWeather\Model\ResourceModel\Weather\Collection;
use Invade\OpenWeather\Model\ResourceModel\Weather as InvadeWeatherResource;
use Magento\Framework\Exception\AlreadyExistsException;

class WeatherRepository implements WeatherRepositoryInterface
{
    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @var WeatherFactory
     */
    protected WeatherFactory $WeatherFactory;

    /**
     * @var InvadeWeatherResource
     */
    protected InvadeWeatherResource $WeatherResource;

    /**
     * @param InvadeWeatherResource $WeatherResource
     * @param WeatherFactory $WeatherFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        InvadeWeatherResource $WeatherResource,
        WeatherFactory  $WeatherFactory,
        CollectionFactory $collectionFactory
    )
    {
        $this->WeatherResource = $WeatherResource;
        $this->WeatherFactory = $WeatherFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param int $lat
     * @param int $lon
     * @return Collection
     */
    public function get(int $lat, int $lon): Collection
    {
        return $this->collectionFactory->create()
            ->addFieldToFilter('lat', $lat)
            ->addFieldToFilter('lon', $lon)
            ->load();
    }

    /**
     * @param WeatherInterface $weather
     * @return void
     * @throws AlreadyExistsException
     */
    public function save(WeatherInterface $weather): void
    {
        $this->WeatherResource->save($weather);
    }
}
