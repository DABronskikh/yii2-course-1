<?php

namespace app\controllers;

use app\models\tables\TaskStatuses;
use app\models\tables\User;
use Yii;
use app\models\tables\Tasks;
use app\models\filters\Tasks as TasksSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class TasksController extends Controller
{

    public function actionIndex()
    {
        //(new Tasks())-> masNewTask();

        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionView($id)
    {
        $model = Tasks::findOne($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
