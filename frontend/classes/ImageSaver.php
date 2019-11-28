<?php


namespace frontend\classes;


use Yii;

class ImageSaver
{
    private $imageName;

    public function save($data)
    {
        $this->imageName = $this->setImageName();

        file_put_contents($this->getPath() . $this->imageName, $data);

        return $this->getImageLink();
    }

    private function getPath()
    {
        return Yii::getAlias('@webroot/images/');
    }

    private function setImageName()
    {
        return 'screen_' . time() . '_' . rand(1, 1000) . '.jpg';
    }

    private function getImageLink()
    {
        return Yii::$app->urlManager->createAbsoluteUrl(Yii::getAlias('@web/images/' . $this->imageName));
    }
}