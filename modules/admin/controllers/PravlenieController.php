<?php
/*
Контроллер отвечаюший за блог
*/

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Pravlenie;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\modules\admin\models\PravlenieSearch;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;


class PravlenieController extends Controller
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

            //Доступ только для админа
            [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin','mehan','regstab','udgu','ggpi','egida'],
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
     * Lists all Squad models.
     * @param $action
     * @return mixed
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionIndex()

    {
        $searchModel = new PravlenieSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }


    /**
     * Displays a single Squad model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)

    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Pravlenie();

        if ($model->load(Yii::$app->request->post())){
            $images = UploadedFile::getInstance($model, 'images');
            if ($images && $images->tempName) {
                $model->images = $images;

                $image_name = $model->images;
                $image_path = '/uploads/images/'  . date('Y/m/d') . '/' .  $image_name;
                if (file_exists('uploads/images/' . '/' . date('Y/m/d'))){
                }
                else
                {
                    mkdir('uploads/images/' . '/' . date('Y/m/d'),0777, true);
                }

                $model->images->saveAs($image_path);
                $model->images = $image_path;
            } else {
                $model->images = $model->getOldAttribute('images');
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Squad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException|ForbiddenHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        //проверка прав файл
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){

            // Загрузка изображений
            $images = UploadedFile::getInstance($model, 'images');
            if ($images && $images->tempName) {
                $model->images = $images;

                $image_name = $model->images;
                $image_path = 'uploads/images/'  . date('Y/m/d') . '/' .  $image_name;
                if (file_exists('uploads/images/' . '/' . date('Y/m/d'))){
                }
                else
                {
                    mkdir('uploads/images/' . '/' . date('Y/m/d'),0777, true);
                }

                $model->images->saveAs($image_path);
                $model->images = $image_path;
            } else {
                $model->images = $model->getOldAttribute('images');
            }
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing Squad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Squad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Squad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pravlenie::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
    
    private function randomFileName($extension = false)
    {
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 1000));
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }

}