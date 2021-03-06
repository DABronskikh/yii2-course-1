<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 17.02.2019
 * Time: 23:30
 */

namespace app\models\mailers;


use app\models\tables\Tasks;
use Yii;
use yii\base\BaseObject;

class TaskMailer extends BaseObject
{
    public function sentTaskCreate(Tasks $task, $subject, $textBody){
        Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom([$task->respionsble->email])
            ->setSubject($subject)
            ->setTextBody($textBody)
            ->send();
    }
}