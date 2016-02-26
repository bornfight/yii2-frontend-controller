<?php

namespace degordian\frontendController;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'degordian\frontendController\controllers';
    public $defaultRoute = 'frontend';

    public function init()
    {
        parent::init();
    }
}
