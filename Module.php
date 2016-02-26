<?php

namespace degordian\frontendController;

use degordian\frontendController\models\FrontendMockBuilder;
use Yii;
use yii\base\Exception;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'degordian\frontendController\controllers';
    public $defaultRoute = 'frontend';

    public $mockMessage = 'Hello from frontend mock';
    public $numberOfIterations = 5;

    public function init()
    {
        FrontendMockBuilder::setMessage($this->mockMessage);
        FrontendMockBuilder::setNumberOfIterations($this->numberOfIterations);
    }
}
