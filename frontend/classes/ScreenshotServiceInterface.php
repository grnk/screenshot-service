<?php


namespace frontend\classes;


interface ScreenshotServiceInterface
{
    public function createRequest();

    public function getScreenshot();

    public function getScreenshotType();
}