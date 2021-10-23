<?php

namespace app\controllers;
use app\models\News;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use Yii;

class ArhiveController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
                'view' => 'error.php'
            ],
            // ...
        ];
    }
    public function beforeAction($action)
    {
        if ($action->id == 'error') {
            $this->layout = 'error.php';
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {        Yii::$app->view->title = "Архив - Студенческие Отряды Удмуртской Республики";
        //$posts = Post::find()->all();
        $query = News::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5]);
        $posts = $query->offset($pages->offset)->orderBy('id DESC')->limit($pages->limit)->all();
        return $this->render('/site/arhive.php', compact('posts', 'pages'));
    }

    public function actionView($slug)
    {
        if($model = News::find()->where(['alias' => $slug])->one()){
            Yii::$app->view->title = "Студенческие Отряды Удмуртской Республики";
            return $this->render('/site/infoblog.php', [ 'model' => $model, 'blog' => News::getBlog()]);
        }
    }
    public function actionTest()
    {        Yii::$app->view->title = "Документы | Студенческие Отряды Удмуртии";
        $array = News::getDocument();
        return $this->render('/site/material', ['material' => $array]);

    }
}