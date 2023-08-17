<?php

namespace Invade\OpenWeather\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\HTTP\Client\Curl;
use Invade\OpenWeather\Model\ResourceModel\Weather\Collection;
use Invade\OpenWeather\Model\WeatherRepository;

class Weather extends Template
{
    /**
     * @var WeatherRepository
     */
    protected WeatherRepository $weatherRepository;

    /**
     * @var Curl
     */
    protected Curl $curl;

    /**
     * @param Template\Context $context
     * @param Curl $curl
     * @param array $data
     * @param WeatherRepository $weatherRepository
     */
    public function __construct(
        Template\Context       $context,
        Curl $curl,
        WeatherRepository $weatherRepository,
        array                  $data = []
    )
    {
        parent::__construct($context, $data);
        $this->curl = $curl;
        $this->weatherRepository = $weatherRepository;
    }

    /**
     * @return Collection
     */
    public function getWeather(): Collection
    {
        return $this->weatherRepository->get($_COOKIE['lat'],$_COOKIE['lon']);
    }
}
