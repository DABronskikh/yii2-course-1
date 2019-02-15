<?php use yii\helpers\Html; ?>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="caption">
            <h4><?= $model->name ?></h4>
            <p><?= $model->discription ?></p>
            <hr>
            <p><?= $model->responsible->username ?></p>
            <?= Html::a('<div></div>', ["view?id={$model->id}"], ['class' => 'list-group-item active']) ?>
        </div>
    </div>
</div>