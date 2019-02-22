<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class LanguageController extends Controller
{

    public function actionIndex($key)
    {
        Yii::$app->session->set('lang', $key);
        return $this->redirect(Yii::$app->request->referrer);
    }

}
