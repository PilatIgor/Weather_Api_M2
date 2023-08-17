<?php

namespace Invade\OpenWeather\Controller\Data;

use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Invade\OpenWeather\Helper\ApiKey;
use Invade\OpenWeather\Api\Data\WeatherInterface as OPI;
use Invade\OpenWeather\Model\WeatherFactory;
use Invade\OpenWeather\Api\WeatherRepositoryInterface;
use Magento\Framework\App\Request\DataPersistorInterface;

class GetPost extends Action
{
    /**
     * @var WeatherFactory
     */
    protected WeatherFactory $weatherFactory;

    /**
     * @var WeatherRepositoryInterface
     */
    protected WeatherRepositoryInterface $weatherRepository;

    /**
     * @var DataPersistorInterface
     */
    protected DataPersistorInterface $dataPersistor;

    /**
     * @var EventManager
     */
    protected EventManager $manager;

    /**
     * @var ApiKey
     */
    protected ApiKey $config;

    /**
     * @var Http
     */
    protected Http $request;

    /**
     * @var Curl
     */
    protected Curl $curl;

    /**
     * @var JsonFactory
     */
    private JsonFactory $jsonFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Curl $curl
     * @param ApiKey $config
     * @param JsonFactory $jsonFactory
     * @param EventManager $manager
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Curl $curl,
        ApiKey $config,
        JsonFactory $jsonFactory,
        EventManager $manager,
        WeatherFactory $weatherFactory,
        WeatherRepositoryInterface $weatherRepository,
        DataPersistorInterface $dataPersistor
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->curl = $curl;
        $this->config = $config;
        $this->jsonFactory = $jsonFactory;
        $this->manager = $manager;
        $this->weatherFactory = $weatherFactory;
        $this->weatherRepository = $weatherRepository;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * @throws \JsonException
     */
    public function execute()
    {
        $result = $this->jsonFactory->create();
        $params = $this->getRequest()->getParams();
        $apiResult = $this->getWeatherData($params['data']['lat'],$params['data']['lon']);
        $arrApiResult = $this->getArrayOfWeatherData($params['data']['lat'],$params['data']['lon']);

        if ($apiResult) {
            $weatherData = $this->extractWeatherData($arrApiResult);
            $openWeather = $this->weatherFactory->create();

            foreach ($weatherData as $key => $value) {
                $openWeather->setData($key, $value);
                $this->dataPersistor->set($key, $value);
            }

            $this->weatherRepository->save($openWeather);
        }
        return $result->setData($apiResult);
    }

    /**
     * @param int $lat
     * @param int $lon
     * @return string
     */
    public function getWeatherData(int $lat, int $lon): string
    {
        $apiKey = $this->config->getApiKey();
        $apiUrl = $this->config->getApiUrl();
        $url = "$apiUrl/weather?lat=$lat&lon=$lon&appid=$apiKey";

        $this->curl->get($url);
        return $this->curl->getBody();
    }

    /**
     * @param array $apiResult
     * @return array
     */
    public function extractWeatherData(array $apiResult): array
    {
        $temperatureData = $apiResult['main'];
        $sysData = $apiResult['sys'];

        return [
            OPI::COUNTRY => $sysData['country'],
            OPI::SUNRISE => $sysData['sunrise'],
            OPI::SUNSET => $sysData['sunset'],
            OPI::TEMPERATURE => $temperatureData['temp'],
            OPI::FEELS_LIKE => $temperatureData['feels_like'],
            OPI::PRESSURE => $temperatureData['pressure'],
            OPI::HUMIDITY => $temperatureData['humidity'],
            OPI::WIND_SPEED => $apiResult['wind']['speed'],
            OPI::CITY => $apiResult['name'],
            OPI::DESCRIPTION => $apiResult['weather'][0]['description'],
            OPI::LAT => $apiResult['coord']['lat'],
            OPI::LON => $apiResult['coord']['lon']
        ];
    }

    /**
     * @param int $lat
     * @param int $lon
     * @return array
     * @throws \JsonException
     */
    public function getArrayOfWeatherData(int $lat, int $lon): array
    {
        $apiKey = $this->config->getApiKey();
        $apiUrl = $this->config->getApiUrl();
        $url = "$apiUrl/weather?lat=$lat&lon=$lon&appid=$apiKey";

        $this->curl->get($url);
        return json_decode($this->curl->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}
