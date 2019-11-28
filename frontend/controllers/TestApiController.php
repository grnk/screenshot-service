<?php


namespace frontend\controllers;


use yii\web\Controller;

class TestApiController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}