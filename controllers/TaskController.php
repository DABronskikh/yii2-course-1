<?php

namespace app\controllers;

use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $model = new Task();
        $model->setAttributes([
            /*'title' => 'title...',*/
            'title' => 'test',
            'description' => 'description...',
            'dateStarting' => '2019-01-01',
            'dateEnd' => '2019-02-01',
            'customer' => 'customer...',
            'performers' => 'performers...'
        ]);

        /*$model->load([
            'Task' => [
                'title' => 'title...',
                'description' => 'description...',
                'dateStarting' => '2019-01-01',
                'dateEnd' => '2019-02-01',
                'customer' => 'customer...',
                'performers' => 'performers...'
            ]
        ], 'Task');*/

        var_dump($model->validate());
        var_dump($model->getErrors());
        var_dump($model);

        exit();

    }
}