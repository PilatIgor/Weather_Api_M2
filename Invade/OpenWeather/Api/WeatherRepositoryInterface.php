<?php

namespace Invade\OpenWeather\Api;

use Invade\OpenWeather\Api\Data\WeatherInterface;
use Invade\OpenWeather\Model\ResourceModel\Weather\Collection;

interface WeatherRepositoryInterface
{
    /**
     * @param int $lat
     * @param int $lon
     * @return Collection
     */
    public function get(int $lat, int $lon): Collection;

    /**
     * @param WeatherInterface $weather
     * @return void
     */
    public function save(WeatherInterface $weather): void;

}
