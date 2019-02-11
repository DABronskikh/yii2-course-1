<?php
echo \app\widgets\TaskPreview::widget([
    'id' => $model->id,
    'title' => $model->name,
    'discription' => $model->discription,
    'responsible' => $model->responsible->username,
]);


