<?php use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<div class="form-task">
    <?php $form = ActiveForm::begin([]); ?>
    <div class="caption">
        <div class="col-sm-6 col-md-7 ">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false) ?>
            <hr>
            <?= $form->field($model, 'discription')
                ->textarea(['maxlength' => true, 'class' => 'form-control', 'rows' => 10])
                ->label(false) ?>
        </div>
        <div class="col-sm-6 col-md-5">
            <blockquote>
                <!--<div class="row">
                <? /*= $form->field($model, 'creator_id')
                    ->dropDownList($user, ['prompt' => 'укажите заказчика', 'class' => 'form-control'])
                    ->label(null, ['class' => 'col-sm-6']) */ ?>
            </div>-->
                <div class="row">
                    <?= $form->field($model, 'creator_id', [
                        'template' => '<div class="col-sm-4 control-label">{label}</div>
                                <div class="col-sm-8">{input}</div>
                                <div class="col-sm-12">{error}</div>'
                    ])->dropDownList($user, ['prompt' => 'укажите заказчика', 'class' => 'form-control']) ?>
                </div>

                <div class="row">
                    <?= $form->field($model, 'responsible_id', [
                        'template' => '<div class="col-sm-4 control-label">{label}</div>
                                <div class="col-sm-8">{input}</div>
                                <div class="col-sm-12">{error}</div>'
                    ])->dropDownList($user, ['prompt' => 'укажите исполнителя', 'class' => 'form-control']) ?>
                </div>

                <div class="row">
                    <?= $form->field($model, 'created_at', [
                        'template' => '<div class="col-sm-4 control-label">{label}</div>
                                <div class="col-sm-8">{input}</div>
                                <div class="col-sm-12">{error}</div>'
                    ]) ?>
                </div>

                <div class="row">
                    <?= $form->field($model, 'deadline', [
                        'template' => '<div class="col-sm-4 control-label">{label}</div>
                                <div class="col-sm-8">{input}</div>
                                <div class="col-sm-12">{error}</div>'
                    ])->textInput(['type' => 'date']) ?>
                </div>

                <div class="row">
                    <?= $form->field($model, 'status_id', [
                        'template' => '<div class="col-sm-4 control-label">{label}</div>
                                <div class="col-sm-8">{input}</div>
                                <div class="col-sm-12">{error}</div>'
                    ])->dropDownList($taskStatuses, ['class' => 'form-control']) ?>
                </div>

                <div class="row">
                    <div class=" form-group">
                        <?= Html::submitButton(Yii::t('app-el-views', 'save'), ['class' => 'btn btn-success col-sm-12']) ?>
                    </div>
                </div>

            </blockquote>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

