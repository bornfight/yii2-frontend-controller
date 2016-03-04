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
        $this->addFrontendUrlRule($app);
    }

    private function addFrontendUrlRule(Application $app)
    {
        $rules = ['frontend/<layout:\w+><view:(.*)>' => 'frontend/frontend/render-raw',];
        $app->getUrlManager()->addRules($rules);
    }
}