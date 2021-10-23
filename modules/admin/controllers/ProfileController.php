<?php
/*
Контроллер отвечаюший за профили
*/
namespace app\modules\admin\controllers;

use app\modules\admin\models\User;
use app\modules\admin\models\ProfileUpdateForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;
use app\modules\admin\models\UploadForm;
use yii\web\UploadedFile;

class ProfileController extends Controller
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => $this->findModel(),
        ]);
    }
   //обновление профиля
   public function actionUpdate()
   {
       $user = $this->findModel();
       $model = new ProfileUpdateForm($user);

       if ($model->load(Yii::$app->request->post()) && $model->update()) {
           return $this->redirect(['index']);
       } else {
           return $this->render('update', [
               'model' => $model,
           ]);
       }
   }
    public function  actionAvatar(){

        {   $imageFile = $this->findModel();
            $model = new UploadForm($imageFile);

            if (Yii::$app->request->isPost) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->upload()) {
                    Yii::$app->session->setFlash('success', 'Изображение загружено');
                }
            }

            return $this->render('avatar', ['model' => $model]);
        }
    }

    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
    //обновление пароей
    public function actionPassword()
    {
        $user = $this->findModel();
        $model = new PasswordChangeForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('password', [
                'model' => $model,
            ]);
        }
    }


}