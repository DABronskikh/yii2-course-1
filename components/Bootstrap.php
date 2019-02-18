<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 17.02.2019
 * Time: 23:22
 */

namespace app\components;

use app\models\mailers\TaskMailer;
use app\models\tables\Tasks;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component
{
    public function init()
    {
        $this->attachEventHandlers();
    }

    public function attachEventHandlers()
    {
        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function ($event) {
            $task = $event->sender;
            $subject = 'New task';
            $textBody = "hi, {$task->respionsble->username}, you have a <a href=\"/tasks/view?id={$task->id}\"> new Task</a>: 
                    {$task->name}}";
            (new TaskMailer())->sentTaskCreate($task, $subject, $textBody);
        });
    }
}