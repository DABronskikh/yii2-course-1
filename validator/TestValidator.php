<?php

namespace app\validator;


class TestValidator extends \yii\validators\Validator
{
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;

        if ($value === 'test') {
            var_dump($value);
            $this->addError($model, $attribute, 'сообщение от валидатора... (недопустимое значение)');
            return;
        }
    }

}