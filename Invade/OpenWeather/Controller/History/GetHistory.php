<?php

namespace Invade\OpenWeather\Controller\History;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Invade\OpenWeather\Model\WeatherRepository;

class GetHistory extends Action implements HttpGetActionInterface, HttpPostActionInterface
{
    /**
     * @var WeatherRepository
     */
    protected WeatherRepository $weatherRepository;

    /**
     * @var PageFactory
     */
    private PageFactory $resultPageFactory;

    /**
     * View constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        WeatherRepository $weatherRepository
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->weatherRepository = $weatherRepository;
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
