<div class="col-sm-3 col-xs-2 col-md-3">
<?php
echo \yii\helpers\Html::a(
    \yii\helpers\Html::img("@web/img/min/{$model->file}", ['alt' => 'img']),
    "@web/img/{$model->file}",
    ['class' => 'profile-link', 'target'=>'_blank']
);
?>
</div>

