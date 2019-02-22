<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?= \app\widgets\Alert::widget() ?>

<?php
//отрисовка виджета для просмотра и редактирования задачи
//var_dump($model);
echo \app\widgets\TaskView::widget([
    'model' => $model,
    'taskStatuses' => $taskStatuses,
    'user' => $user,
]);
?>


<!--форма для загрузки картинок к задаче-->
<?php $form = ActiveForm::begin(['action' => 'new-img'],[]); ?>
<?= $form->field($newFormFileImage, 'task_id')->hiddenInput()->label('') ?>
<?= $form->field($newFormFileImage, 'file')->fileInput(['required'=>true]) ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('app-el-views', 'addImg'), ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>


<hr>
<!--картинки-->
<!--заменить виждет на более поджодящий-->
<div class="row">
    <?php
    echo \yii\widgets\ListView::widget([
        'dataProvider' => $arrFileImg,
        'itemView' => '_preview-img'
    ]);
    ?>
</div>


<hr>
<!--форма для добавления комментариев к задаче-->
<?php $form = ActiveForm::begin(['action' => 'new-comment'],[]); ?>
<?= $form->field($newFormComment, 'task_id')->hiddenInput()->label('') ?>
<?= $form->field($newFormComment, 'comment')->textarea(['required'=>true]) ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('app-el-views', 'addComment'), ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>
<hr>

<!--вывод комментаиев, пока без редактирования и удаления-->
<?php
echo \yii\widgets\ListView::widget([
    'dataProvider' => $arrComments,
    'itemView' => '_preview-comments'
]);
?>
