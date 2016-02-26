<?php


namespace degordian\frontendController;


use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;

class RouteBootstrap implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {

        $app->on(Application::EVENT_BEFORE_REQUEST, function() {
            $rules = ['/' => 'frontend/url'];
            Yii::$app->getUrlManager()->addRules($rules);
        });
    }
}