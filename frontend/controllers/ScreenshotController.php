<?php


namespace frontend\controllers;

use yii\rest\Controller;

class ScreenshotController extends Controller
{
    public function actionIndex()
    {
        return $this->asJson('ok');
    }
}