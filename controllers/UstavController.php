<?php

namespace app\controllers;

use Yii;
use app\models\Question;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\Zayavki_na_otryad;

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

            //Доступ только для зарегенных
            [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
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
        $model = new Zayavki_na_otryad();

        if ($model->load(Yii::$app->request->post())) {
           
            $model->name;
            $model->familia;
            $model->otchestvo;
            $model->telefon;
            $model->city;
            $model->mesto_uchebi;
            $unics = $model->id_question = rand(0, 9999999);
            $modelQuestion->id_zayavka = rand(0, 9999999);
            $modelQuestion->save();
            $model->save();

            return $this->redirect(['/site/ustav']);
        } else {
            return $this->render('/site/ustav', ['model' => $model, 'modelQuestion' => $modelQuestion]);
        }
    }
}
