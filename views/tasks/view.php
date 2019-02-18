<?= \app\widgets\Alert::widget() ?>

<?php
//var_dump($model);
echo \app\widgets\TaskView::widget([
    'model' => $model,
    'taskStatuses' => $taskStatuses,
    'user' => $user,
]);