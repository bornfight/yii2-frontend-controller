<?php

namespace degordian\frontendController\controllers;

use Yii;
use yii\web\Controller;

class FrontendController extends Controller
{
    public function actionIndex()
    {
        //@ToDo: Print usage info
    }

    public function actionRenderRaw($view, $layout = null)
    {
        $this->layout = $layout ? sprintf('//%s', ltrim($layout, '/')) : false;
        $view = sprintf('//%s', ltrim($view, '/'));
        return $this->render($view);
    }
}
