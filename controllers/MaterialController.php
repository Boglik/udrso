<?php

namespace app\controllers;
use app\models\Material;
use app\models\News;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use Yii;

class MaterialController extends Controller
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
    public $title;


    public function actionIndex()
    {   $array = Material::find()->all();
        Yii::$app->view->title = "Документы | Студенческие Отряды Удмуртской Республики";
        return $this->render('/site/material', ['material' => $array]);
    }

    public function actionView($slug)
    {
        if($model = Material::find()->where(['alias' => $slug])->one()){
            Yii::$app->view->title = "Студенческие Отряды Удмуртской Республики";
            return $this->render('/site/material_info', [ 'model' => $model]);
        }
    }
}