<?php

namespace frontend\classes;

use yii\helpers\Json;
use yii\httpclient\Client;


class GoogleScreenshotService implements ScreenshotServiceInterface
{
    private $url;
    private $response;

    public function __construct($url)
    {
        $this->url = urlencode($url);
    }

    private function getClient()
    {
        return new Client([
            'baseUrl' => "https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$this->url&screenshot=true&width=800"
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
        $screenshot = Json::decode($this->response->content)['screenshot']['data'];

        return base64_decode(str_replace(array('_','-'),array('/','+'), $screenshot));
    }

    public function getScreenshotType()
    {
        $screenshot = Json::decode($this->response->content)['screenshot']['mime_type'];

        return $screenshot;
    }
}