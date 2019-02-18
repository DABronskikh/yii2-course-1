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
        $searchModel = new TasksSearch();
        if (Yii::$app->request->queryParams) {
            $dataProvider = $searchModel->taskByMonth(Yii::$app->request->queryParams);
        } else {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $model = Tasks::findOne($id);
        $taskStatuses = ArrayHelper::map(TaskStatuses::find()->all(), 'id', 'name');
        $user = ArrayHelper::map(User::find()->all(), 'id', 'username');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Сохранено');
        }

        return $this->render('view', [
            'model' => $model,
            'taskStatuses' => $taskStatuses,
            'user' => $user,
        ]);
    }
}
