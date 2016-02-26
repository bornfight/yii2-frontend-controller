<?php

namespace degordian\frontendController\controllers;

use yii\web\Controller;

class FrontendController extends Controller
{
    public function actionIndex() {
        //usage info
    }

    public function actionRenderRaw()
    {
        echo "raw";
        $viewPath = isset($viewPath) ? $viewPath : Yii::$app->request->get('view');
        $this->layout = isset($layout) ? $layout : Yii::$app->request->get('layout');
        return $this->render('/' . $viewPath);
    }

    public function actionUrl() {
        echo "url";
    }
}
