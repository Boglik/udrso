<?php

namespace app\modules\kabinet\controllers;

use app\models\Cons;
use app\modules\kabinet\models\BlogSite;
use app\modules\kabinet\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class BlogSiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
                Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::INFO];
        Yii::$app->view->title = $model->title . ' — ' . Cons::RSO;
        return $this->render('/profile/index', [
            'model' => $this->findModel(),
        ]);
    }
    //обновление профиля
    public function actionUpdate()
    {
        $user = $this->findModel();
        $model = new BlogSite($user);

        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('/profile/update', [
                'model' => $model,
            ]);
        }
    }
    // public function  actionAvatar(){

    //     {   $imageFile = $this->findModel();
    //         $model = new UploadForm($imageFile);

    //         if (Yii::$app->request->isPost) {
    //             $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
    //             if ($model->upload()) {
    //                 Yii::$app->session->setFlash('success', 'Изображение загружено');
    //             }
    //         }

    //         return $this->render('avatar', ['model' => $model]);
    //     }
    // }

    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
    // //обновление пароей
    // public function actionPassword()
    // {
    //     $user = $this->findModel();
    //     $model = new PasswordChangeForm($user);

    //     if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
    //         return $this->redirect(['index']);
    //     } else {
    //         return $this->render('password', [
    //             'model' => $model,
    //         ]);
    //     }
    // }


}