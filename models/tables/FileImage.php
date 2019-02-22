<?php

namespace app\models\tables;

use Yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * This is the model class for table "file_image".
 *
 * @property int $id
 * @property int $task_id
 * @property UploadedFile $file
 *
 * @property Tasks $task
 */
class FileImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id'], 'required'],
            [['task_id'], 'integer'],
            //[['file'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg, png'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }

    public function getFileName(){
        return $this->file->getBaseName().'.'.$this->file->getExtension();
    }

    public function saveFile(){
        if ($this->validate()){
            $filePath=Yii::getAlias("@img/{$this->getFileName()}");
            $this->file->saveAs($filePath);

            Image::thumbnail($filePath, 150, 100)
                ->save(Yii::getAlias("@imgMin/{$this->getFileName()}"));
        }
    }

}
