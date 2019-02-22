<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $discription
 * @property int $creator_id
 * @property int $responsible_id
 * @property string $deadline
 * @property int $status_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $creator
 * @property User $responsible
 * @property TaskStatuses $status
 */
class Tasks extends \yii\db\ActiveRecord
{
    //const EVENT_NEW_TASK = 'eventNewTask';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'discription', 'creator_id', 'responsible_id', 'deadline', 'status_id'], 'required'],
            [['creator_id', 'responsible_id', 'status_id'], 'integer'],
            [['name', 'discription'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator_id' => 'id']],
            [['responsible_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['responsible_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskStatuses::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['created_at', 'updated_at', 'deadline'], 'safe'],
        ];
    }

 /*   public function init()
    {
        $this->on(self::EVENT_AFTER_INSERT, function ($event) {
            $this->masNewTask($event->sender);
        });
        //parent::init();
    }*/

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app-tasks', 'id'),
            'name' => Yii::t('app-tasks', 'name'),
            'discription' => Yii::t('app-tasks', 'discription'),
            'creator_id' => Yii::t('app-tasks', 'creator'),
            'responsible_id' => Yii::t('app-tasks', 'responsible'),
            'deadline' => Yii::t('app-tasks', 'deadline'),
            'status_id' => Yii::t('app-tasks', 'status'),
            'created_at' => Yii::t('app-tasks', 'createdAt'),
            'updated_at' => Yii::t('app-tasks', 'updatedAt'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespionsble()
    {
        return $this->hasOne(User::className(), ['id' => 'responsible_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(TaskStatuses::className(), ['id' => 'status_id']);
    }

    /*
    public function masNewTask(Tasks $newTask)
    {
        $user = User::findOne($newTask->responsible);
        $textBody = "hi, {$user->username}, you have a <a href=\"/tasks/view?id={$newTask->id}\"> new Task</a>: 
                    {$newTask->name}}";

        Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom([$user->email])
            ->setSubject('New Task')
            ->setTextBody($textBody)
            ->send();
    }*/
}
