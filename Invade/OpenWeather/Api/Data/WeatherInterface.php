<?php

namespace Invade\OpenWeather\Api\Data;

interface WeatherInterface
{
    const ID             = 'id';
    const CITY           = 'city';
    const COUNTRY        = 'country';
    const DESCRIPTION    = 'description';
    const TEMPERATURE    = 'temperature';
    const FEELS_LIKE     = 'feels_like';
    const PRESSURE       = 'pressure';
    const HUMIDITY       = 'humidity';
    const WIND_SPEED     = 'wind_speed';
    const SUNRISE        = 'sunrise';
    const SUNSET         = 'sunset';
    const CREATED_AT     = 'created_at';
    const LON            = 'lon';
    const LAT            = 'lat';



    /**
     * @return array|mixed|null
     */
    public function getId();

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @param string $city
     * @return WeatherInterface
     */
    public function setCity(string $city): WeatherInterface;

    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @param string $country
     * @return WeatherInterface
     */
    public function setCountry(string $country): WeatherInterface;

    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @param string $description
     * @return WeatherInterface
     */
    public function setDescription(string $description): WeatherInterface;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param float $temperature
     * @return WeatherInterface
     */
    public function setTemperature(float $temperature): WeatherInterface;

    /**
     * @return float
     */
    public function getTemperature(): float;

    /**
     * @param float $feelsLike
     * @return WeatherInterface
     */
    public function setFeelsLike(float $feelsLike): WeatherInterface;

    /**
     * @return float
     */
    public function getFeelsLike(): float;

    /**
     * @param int $pressure
     * @return WeatherInterface
     */
    public function setPressure(int $pressure): WeatherInterface;

    /**
     * @return int
     */
    public function getPressure(): int;

    /**
     * @param int $humidity
     * @return WeatherInterface
     */
    public function setHumidity(int $humidity): WeatherInterface;

    /**
     * @return int
     */
    public function getHumidity(): int;

    /**
     * @param float $windSpeed
     * @return WeatherInterface
     */
    public function setWindSpeed(float $windSpeed): WeatherInterface;

    /**
     * @return int
     */
    public function getWindSpeed(): int;

    /**
     * @param string $sunrise
     * @return WeatherInterface
     */
    public function setSunrise(string $sunrise): WeatherInterface;

    /**
     * @return string
     */
    public function getSunrise(): string;

    /**
     * @param string $sunset
     * @return WeatherInterface
     */
    public function setSunset(string $sunset): WeatherInterface;

    /**
     * @return string
     */
    public function getSunset(): string;

    /**
     * @param int $lon
     * @return WeatherInterface
     */
    public function setLon(int $lon): WeatherInterface;

    /**
     * @return int
     */
    public function getLon(): int;

    /**
     * @param int $lat
     * @return WeatherInterface
     */
    public function setLat(int $lat): WeatherInterface;

    /**
     * @return int
     */
    public function getLat(): int;
}
