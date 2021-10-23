<?php
/*
Контроллер отвечаюший за новостную ленту на сайте
*/
namespace app\modules\admin\controllers;

use app\modules\admin\models\Feed;
use app\modules\admin\models\News;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\HttpException;




class FeedController extends Controller

{
    /**
     * {@inheritdoc}
     */
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

            //Доступ только для админов
            [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                         'allow' => true,
                        'roles' => ['admin', 'mehan', 'regstab', 'udgu', 'ggpi', 'egida'],
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function actionIndex()
    {

        //$posts = Post::find()->select('id, title, excerpt')->all();
        Yii::$app->view->params['breadcrumbs'][] = ['label' => 'Новости'];
        Yii::$app->view->title = "Внутренние новости Студенческих Отрядов";
        $query = Feed::find()->select('id, title,anonce,text')->orderBy('id DESC');
        $pages = new Pagination(['totalCount' =>$query->count(), 'pageSize' => 20, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('/site/feed', compact('posts', 'pages'));
    }

    public function actionView($id){
        $model = News::find()->where('id = :id')->addParams([':id' => $id])->one();

        if($model){


            Yii::$app->view->params['breadcrumbs'][] = ['label' => 'Новости', 'url' =>'/admin/news/'];
               Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->title];
               Yii::$app->view->title = $model->title . ' — '. 'Студенческие отряды Удмуртской Республики';
           }
//        $category = News::find()->where(['title' => $title])->one();
//        Yii::$app->view->params['breadcrumbs'][] = ['label' => 'Новости', 'url' =>'/admin/news/'];
//        Yii::$app->view->params['breadcrumbs'][] = ['label' => $category];
//        Yii::$app->view->title = "Внутренние новости Студенческих Педагогических Отрядов";
//        $id = \Yii::$app->request->get('id');
        $post = Feed::findOne($id);
        if(empty($post)) throw new HttpException(404,'Такой страницы нет');
        return $this->render('/site/view', compact('post'));

    }

}















