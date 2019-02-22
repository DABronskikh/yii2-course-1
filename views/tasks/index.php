<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tasks">
    <?php $form = ActiveForm::begin(['action' => [''], 'method' => 'get']); ?>
    <?= $form->field($searchModel, 'created_at', [
        'template' => '<label for="date-tasks" class="col-sm-9">Сортировка по месяцу: </label>
        <div class="col-sm-3">
            <div class="input-group">
                {input}
        <span class="input-group-btn btn-date-tasks">
        <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>
        </button>
        </span>
            </div>
        </div>'
    ])->textInput(['type' => 'date', 'required' => true, 'value' => date("Y-m-d")])
    ?>
    <?php ActiveForm::end(); ?>

    <?php
    echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_preview'
    ]);
    ?>
</div>
