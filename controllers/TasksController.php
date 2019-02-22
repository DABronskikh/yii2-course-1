<?php

namespace app\controllers;

use app\models\tables\Comment;
use app\models\tables\FileImage;
use app\models\tables\TaskStatuses;
use app\models\tables\User;
use Yii;
use app\models\tables\Tasks;
use app\models\filters\Tasks as TasksSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\UploadedFile;


class TasksController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new TasksSearch();
        if (Yii::$app->request->queryParams) {
            $dataProvider = $searchModel->taskByMonth(Yii::$app->request->queryParams);
        } else {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $model = Tasks::findOne($id);
        $taskStatuses = ArrayHelper::map(TaskStatuses::find()->all(), 'id', 'name');
        $user = ArrayHelper::map(User::find()->all(), 'id', 'username');

        $newFormFileImage = new FileImage();
        $newFormFileImage->task_id = $id;
        $arrFileImg = (new \app\models\filters\FileImage())->fileImgByTaskId($id);

        $newFormComment = new Comment();
        $newFormComment->task_id = $id;
        $arrComments = (new \app\models\filters\Comment())->commentsByTaskId($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Yii::$app->session->setFlash('success', 'задача сохранена');
            Yii::$app->session->setFlash('success', Yii::t('app-flash', 'taskUpdated'));
        }

        return $this->render('view', [
            'model' => $model,
            'taskStatuses' => $taskStatuses,
            'user' => $user,

            'newFormFileImage' => $newFormFileImage,
            'arrFileImg' => $arrFileImg,

            'newFormComment' => $newFormComment,
            'arrComments' => $arrComments,
        ]);
    }

    public function actionNewImg(){
        //загружаем картинку на сервер и делаем редирект на страницу с которой был запрос
        $model = new FileImage();

        if ($model->load(Yii::$app->request->post())){
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->saveFile();

            $model->file = $model->getFileName();
            $model->save();

            //Yii::$app->session->setFlash('success', 'новая картинка');
            Yii::$app->session->setFlash('success', Yii::t('app-flash', 'imgUploaded'));
            return $this->redirect(Yii::$app->request->referrer);
        }
        die('oops!');
    }

    public function actionNewComment(){
        $model = new Comment();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //ii::$app->session->setFlash('success', 'новый комментарий');
            Yii::$app->session->setFlash('success', Yii::t('app-flash', 'commentAdd'));
            return $this->redirect(Yii::$app->request->referrer);
        }
        die('oops!');
    }
}
