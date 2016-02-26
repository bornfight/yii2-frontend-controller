<?php

namespace degordian\frontendController;

use Yii;
use yii\base\Exception;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'degordian\frontendController\controllers';
    public $defaultRoute = 'frontend';

    public function init()
    {

    }
}
