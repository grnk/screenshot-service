<?php


namespace frontend\controllers;

use frontend\classes\GoogleScreenshotService;
use frontend\classes\ImageSaver;
use frontend\classes\SShotScreenshotService;
use yii\rest\Controller;

class ScreenshotController extends Controller
{
    //Google PageSpeed Insights
    public function actionIndex($url)
    {
        $screenshot = new GoogleScreenshotService($url);
        $result = $screenshot->createRequest();

        return $this->asJson([
            'url' => $url,
            'imageLink' => (new ImageSaver())->save($screenshot->getScreenshot()),
        ]);
    }

    public function actionSShot($url, $resolution = '1024', $width = '800')
    {
        $screenshot = new SShotScreenshotService($url, $resolution, $width);
        $result = $screenshot->createRequest();

        return $this->asJson([
            'url' => $url,
            'imageLink' => (new ImageSaver())->save($screenshot->getScreenshot()),
        ]);
    }
}