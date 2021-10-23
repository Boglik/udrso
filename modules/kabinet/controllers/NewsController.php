<?php

namespace app\modules\kabinet\controllers;

use app\controllers\AppController;
use app\models\Cons;
use app\modules\kabinet\models\News;
use app\modules\kabinet\models\Squad;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\HttpException;


class NewsController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],

            ],

            //Доступ только для комсостава
            [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                ],

            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $model = Squad::find()->where('id = :id')->addParams([':id' => $id])->one();

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::NEWS, 'url' =>'/kabinet/news'];
        Yii::$app->view->title =  Cons::NEWS . '  — ' . Cons::RSO;
        //$posts = Post::find()->select('id, title, excerpt')->all();
        $query = News::find()->select('id, title,anonce,text')->orderBy('id DESC');
        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => 5, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('posts', 'pages'));
    }

    public function actionView($id){
               $model = News::find()->where('id = :id')->addParams([':id' => $id])->one();

        if($model){

            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::NEWS, 'url' =>'/kabinet/news'];
         Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title =  Yii::$app->view->title = $model->title];
        Yii::$app->view->title = Yii::$app->view->title = $model->title . '  — ' . Yii::$app->view->title =  Cons::NEWS . '  —' . Cons::RSO;

              
           }
        $id = Yii::$app->request->get('id');
        $post = News::findOne($id);
        if(empty($post)) throw new HttpException(404,'Такой страницы нет');
        return $this->render('view', compact('post'));

    }
}















