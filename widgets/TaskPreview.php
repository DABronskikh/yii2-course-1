<?php

namespace app\widgets;

use yii\base\Widget;

class TaskPreview extends Widget
{
    public $id = 'id';
    public $title = 'title';
    public $discription = 'discription';
    public $responsible = 'responsible';

    public function run()
    {
        return $this->render('task-preview', [
            'id'=> $this->id,
            'title'=> $this->title,
            'discription'=> $this->discription,
            'responsible'=> $this->responsible,
        ]);
    }
}