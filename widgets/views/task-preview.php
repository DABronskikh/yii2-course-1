<?php use yii\helpers\Html; ?>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="caption">
            <h4><?= $title ?></h4>
            <p><?= $discription ?></p>
            <hr>
            <p><?= $responsible ?></p>
            <?= Html::a('<div></div>', ["view?id={$id}"], ['class' => 'list-group-item active']) ?>
        </div>
    </div>
</div>