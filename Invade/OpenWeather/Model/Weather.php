<?php

namespace Invade\OpenWeather\Model;

use Magento\Framework\Model\AbstractModel;
use Invade\OpenWeather\Api\Data\WeatherInterface;

class Weather extends AbstractModel implements WeatherInterface
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init(ResourceModel\Weather::class);
    }

    /**
     * @return array|mixed|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $city
     * @return Weather
     */
    public function setCity(string $city): Weather
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->getData( self::CITY);
    }

    /**
     * @param string $country
     * @return Weather
     */
    public function setCountry(string $country): Weather
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * @param string $description
     * @return Weather
     */
    public function setDescription(string $description): Weather
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @param float $temperature
     * @return Weather
     */
    public function setTemperature(float $temperature): Weather
    {
        return $this->setData(self::TEMPERATURE, $temperature);
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->getData(self::TEMPERATURE);
    }

    /**
     * @param float $feelsLike
     * @return Weather
     */
    public function setFeelsLike(float $feelsLike): Weather
    {
        return $this->setData(self::FEELS_LIKE, $feelsLike);
    }

    /**
     * @return float
     */
    public function getFeelsLike(): float
    {
        return $this->getData(self::FEELS_LIKE);
    }

    /**
     * @param int $pressure
     * @return Weather
     */
    public function setPressure(int $pressure): Weather
    {
        return $this->setData(self::PRESSURE, $pressure);
    }

    /**
     * @return int
     */
    public function getPressure(): int
    {
        return $this->getData(self::PRESSURE);
    }

    /**
     * @param int $humidity
     * @return Weather
     */
    public function setHumidity(int $humidity): Weather
    {
        return $this->setData(self::HUMIDITY, $humidity);
    }

    /**
     * @return int
     */
    public function getHumidity(): int
    {
        return $this->getData(self::HUMIDITY);
    }

    /**
     * @param float $windSpeed
     * @return Weather
     */
    public function setWindSpeed(float $windSpeed): Weather
    {
        return $this->setData(self::WIND_SPEED, $windSpeed);
    }

    /**
     * @return int
     */
    public function getWindSpeed(): int
    {
        return $this->getData(self::WIND_SPEED);
    }

    /**
     * @param string $sunrise
     * @return Weather
     */
    public function setSunrise(string $sunrise): Weather
    {
        return $this->setData(self::SUNRISE, $sunrise);
    }

    /**
     * @return string
     */
    public function getSunrise(): string
    {
        return $this->getData(self::SUNRISE);
    }

    /**
     * @param string $sunset
     * @return Weather
     */
    public function setSunset(string $sunset): Weather
    {
        return $this->setData(self::SUNSET, $sunset);
    }

    /**
     * @return string
     */
    public function getSunset(): string
    {
        return $this->getData(self::SUNSET);
    }

    /**
     * @param int $lon
     * @return Weather
     */
    public function setLon(int $lon): Weather
    {
        return $this->setData(self::LON, $lon);
    }

    /**
     * @return int
     */
    public function getLon(): int
    {
        return $this->getData(self::LON);
    }

    /**
     * @param int $lat
     * @return Weather
     */
    public function setLat(int $lat): Weather
    {
       return $this->setData(self::LAT, $lat);
    }

    /**
     * @return int
     */
    public function getLat(): int
    {
        return $this->getData(self::LAT);
    }
}
