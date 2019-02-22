<?php

namespace app\widgets;

use app\models\tables\Tasks;
use yii\base\Widget;

class TaskView extends Widget
{
    public $model;
    public $taskStatuses;
    public $user;
    public $mes;

    public function run()
    {
        if (is_a($this->model, Tasks::class)) {
            return $this->render('task-view', [
                'model' => $this->model,
                'taskStatuses' => $this->taskStatuses,
                'user' => $this->user,
            ]);
        }
        throw new \Exception("Неправильный объект");
    }
}