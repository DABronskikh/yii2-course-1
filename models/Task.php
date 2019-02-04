<?php


namespace app\models;

use yii\base\Model;

class Task extends Model
{
    public $title;
    public $description;
    public $dateStarting;
    public $dateEnd;
    public $customer;
    public $performers;

    public function rules()
    {
        return [
            [['title','description','dateStarting','dateEnd','customer','performers'],'required'],
            [['title'],'app\validator\TestValidator'],
        ];
    }


}