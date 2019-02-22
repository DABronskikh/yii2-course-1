<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\FileImage */

$this->title = 'Create File Image';
$this->params['breadcrumbs'][] = ['label' => 'File Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
