<?php

use app\models\tables\TaskStatuses;
use app\models\tables\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discription')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'creator_id')->textInput() */?>
    <?= $form->field($model, 'creator_id')->dropDownList($user, ['prompt'=>'укажите заказчика']) ?>

    <?/*= $form->field($model, 'responsible_id')->textInput() */?>
    <?= $form->field($model, 'responsible_id')->dropDownList($user, ['prompt'=>'укажите исполнителя']) ?>

    <?/*= $form->field($model, 'date_create')->textInput() */?>

    <?= $form->field($model, 'deadline')->textInput(['type' => 'date']) ?>

    <? /*= $form->field($model, 'status_id')->textInput() */ ?>
    <?= $form->field($model, 'status_id')->dropDownList($taskStatuses)  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
