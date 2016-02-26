<?php

namespace degordian\frontendController\controllers;

use degordian\frontendController\models\FrontendMockBuilder;
use Yii;
use yii\web\Controller;

class FrontendController extends Controller
{
    public function actionIndex()
    {
        //@ToDo: Print usage info
    }

    public function actionRenderRaw($view, $layout = null, $m = null, $i = null)
    {
        $this->initMockParams($m, $i);
        $this->layout = $layout ? sprintf('//%s', ltrim($layout, '/')) : false;
        $view = sprintf('//%s', ltrim($view, '/'));
        return $this->render($view);
    }

    private function initMockParams($mockMessage, $numberOfIterations)
    {
        if ($mockMessage != null) {
            FrontendMockBuilder::setMessage($mockMessage);
        }
        if ($numberOfIterations != null) {
            FrontendMockBuilder::setNumberOfIterations($numberOfIterations);
        }
    }
}
