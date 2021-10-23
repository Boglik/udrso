<?php

namespace app\modules\kabinet\controllers;

use app\models\FeedbackForm;
use Yii;
use app\modules\kabinet\models\Ustav;
use app\modules\kabinet\models\Question;
use frontend\models\SquadSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use yii\web\View;
use app\modules\kabinet\models\User;
use frontend\models\Squad;

class UstavController extends Controller
{
//ограничиваем доступы. Распредяем роли.

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
                        'roles' => ['?'],
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
        $modelQuestion = new Question();
        $model = new Ustav();

        if ($model->load(Yii::$app->request->post()) && $modelQuestion->load(Yii::$app->request->post())) {

            $query = $modelQuestion->id_user = $model->id_user; // сохраняет в таблицу question and squad штаб и отряд
            $query = $modelQuestion->fio = $model->fio; 
            
            $query_model = User::findOne($query);
            $modelQuestion->stabs = $model->stabs;
            $model->name_stab = $query_model->name_stab;
            $model->napr = $query_model->napravlenie;
            $model->otryad = $query_model->name;
            $modelQuestion->save();
            $model->save();

            return $this->redirect(['ura']);
        } else {
            return $this->renderFile('@app/views/ustav/index.php', ['model' => $model, 'modelQuestion' => $modelQuestion]);
        }
    }

    public function actionUra()

    {
        $modelQuestion = new Question();
        $model = new Ustav();

        if ($model->load(Yii::$app->request->post()) && $modelQuestion->load(Yii::$app->request->post())) {

            $modelQuestion->save();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderFile('@app/views/ustav/ura.php', ['model' => $model, 'modelQuestion' => $modelQuestion]);
        }
    }
}
