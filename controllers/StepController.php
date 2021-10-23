<?php

namespace app\controllers;
use app\models\Step;
use app\modules\admin\models\Question;
use app\modules\kabinet\models\Squad;
use app\modules\kabinet\models\User;
use Yii;
use yii\base\BaseObject;
use yii\filters\AccessControl;
use yii\web\Controller;


class StepController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        Yii::$app->view->title = "1 этап завершения регистрации на сайте | Студенческие Отряды Удмуртской Республики";
        $model = new Squad();

        if ($model->load(Yii::$app->request->post())) {
            $model->time = date("d.m.Y");
            $model->id_squad = Yii::$app->user->id; // Модель вставляет в ай-юзер данные айди

            $model->save();

            return $this->redirect(['/step/step']);
        } else {
            return $this->render('/step/step', ['model' => $model]);
        }

    }
    public function actionStep()
    {
        Yii::$app->view->title = "2 этап завершения регистрации на сайте | Студенческие Отряды Удмуртской Республики";
        return $this->render('/step/step2');
        }
    public function actionStep2()
    {
        Yii::$app->view->title = "3 этап завершения регистрации на сайте | Студенческие Отряды Удмуртской Республики";
        $model = new Question();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_ustav = Yii::$app->user->id; // Модель вставляет в ай-юзер данные айди
            $model->save();

            return $this->redirect(['/step/step3']);
        } else {
            return $this->render('/step/step3', ['model' => $model]);
        }

    }
    public function actionStep3()
    {
        Yii::$app->view->title = "Завершение регистрации на сайте | Студенческие Отряды Удмуртской Республики";

        return $this->render('/step/finish');
        }
    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
}