<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 06.02.2019
 * Time: 21:36
 */

namespace app\controllers;


use app\models\tables\User;
use yii\web\Controller;

class DBTestController extends Controller
{
    public function actionIndex()
    {
        //$db = \Yii::$app->db;

        //var_dump($db->createCommand("SELECT * FROM user where id = :id ")
        //    ->bindValue(':id',2)
        //    ->queryOne());

        $model = User::findOne(1);
        var_dump($model);
        die();



        //return $this->render('hello');
    }
}