<?php

namespace app\commands;


use app\models\mailers\TaskMailer;
use app\models\tables\Tasks;
use yii\console\Controller;
use yii\helpers\Console;

class TasksController extends Controller
{
    /**
     * Sending messages about the expiration of the task
     */
    public function actionIndex()
    {
        //$tasks = Tasks::find()->where(['deadline'=> '2019-01-01'])->all();
        $tasks = Tasks::find()->where(['deadline'=>date('Y-m-d', time() + (60*60*24))])->all();
        $total =  (!count($tasks))? 0 : count($tasks)-1;

        Console::startProgress(0, $total);
        foreach ($tasks as $key => $task) {
            $subject = 'the due date of the task expires';
            $textBody = "hi, {$task->respionsble->username}, the due date of the task expires | 
                    {$task->name}}";
            (new TaskMailer())->sentTaskCreate($task, $subject, $textBody);
            Console::updateProgress($key, $total);
        };
        Console::endProgress();
    }
}