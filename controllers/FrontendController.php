<?php

namespace degordian\frontendController\controllers;

use yii\web\Controller;

class FrontendController extends Controller
{
    public $layout = false;

    public function init()
    {
        echo "hello";
    }

    public function actionRenderRaw()
    {
        $viewPath = isset($viewPath) ? $viewPath : Yii::$app->request->get('view');
        $this->layout = isset($layout) ? $layout : Yii::$app->request->get('layout');
        return $this->render('/' . $viewPath);
    }
}