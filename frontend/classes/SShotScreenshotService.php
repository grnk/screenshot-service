<?php

namespace frontend\classes;

use yii\httpclient\Client;


class SShotScreenshotService implements ScreenshotServiceInterface
{
    private $url;
    private $resolution;
    private $width;

    private $response;

    public function __construct($url, $resolution, $width)
    {

        $this->url = urlencode($url);
        $this->resolution = $resolution;
        $this->width = $width;
    }

    private function getClient()
    {
        return new Client([
            'baseUrl' => "http://mini.s-shot.ru/$this->resolution/$this->width/jpeg/?$this->url"
        ]);
    }

    public function createRequest()
    {
        $this->response = $this->getClient()
            ->createRequest()
            ->setMethod('GET')
            ->send();

        return $this->response->isOk;
    }
    
    public function getScreenshot()
    {
        $screenshot = $this->response->content;

        return $screenshot;
    }

    public function getScreenshotType()
    {
        return 'image/jpeg';
    }
}