<?php

namespace degordian\frontendController;

use Yii;
use yii\base\Exception;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'degordian\frontendController\controllers';
    public $defaultRoute = 'frontend';

    public $urlRules = [];
    const DEFAULT_ROUTE = ['/' => 'frontend/url'];

    public function init()
    {
        if (is_array($this->urlRules) == false) {
            throw new Exception('Attribute urlRules has to be of type array');
        }
        $this->urlRules = array_merge($this->urlRules, self::DEFAULT_ROUTE);
        $this->addUrlManagerRules($this->urlRules);
        parent::init();
    }

    private function addUrlManagerRules($rules) {
        Yii::$app->getUrlManager()->addRules($rules);
    }
}
