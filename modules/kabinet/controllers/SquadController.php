<?php

namespace app\modules\kabinet\controllers;

use app\modules\kabinet\models\Squad;
use app\modules\kabinet\models\SquadSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * SquadController implements the CRUD actions for Squad model.
 */
class SquadController extends Controller
{
    //ограничиваем доступы. Распределяем роли.
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

    public $docs;
    /**
     * {@inheritdoc}
     */
//ограничиваем доступы. Распредяем роли.


    /**
     * Lists all Squad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SquadSearch();
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
     * @throws NotFoundHttpException|ForbiddenHttpException if the model cannot be found
     */
    public function actionView($id)
   {
       //проверка прав файл
       $model = $this->findModel($id);
        if (!\Yii::$app->user->can('OwnSquad', ['post' => $model])) {
            throw new ForbiddenHttpException('Access denied');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Squad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Squad();

        if ($model->load(Yii::$app->request->post())){
            $model->docs = UploadedFile::getInstance($model, 'docs');

         if($model->docs!=null) {
            $image_name = $this->randomFileName($model->docs->extension);
            $image_path = 'uploads/documents/'  . date('Y/m/d') . '/' .  $image_name;
			if (file_exists('uploads/documents/' . '/' . date('Y/m/d'))){
	
				}
				else
				{
					mkdir('uploads/documents/' . '/' . date('Y/m/d'),0777, true);
					}

				  $model->docs->saveAs($image_path);
                  $model->docs = $image_path;
          }
            $model->time = date("d.m.Y");
            $model->name_eng = Yii::$app->user->identity->stab_name_eng;
            $model->id_user = Yii::$app->user->id; // Модель вставляет в ай-юзер данные айди
            $model->stabs = Yii::$app->user->identity->id_stab; // В поле штаб, которая находится в таблице Squad - вставляется данные из ай-штаю таблицы  user
            $model->name_stab = Yii::$app->user->identity->name_stab; // в поле name_stab  из таблицы squad вставляется данная из таблицы user поля name-stab
            $model->stud_napravlenie = Yii::$app->user->identity->napravlenie_export; // Здесь все берется из таблицы юзер, направление и нэйм - и вставляется в соответствющие поля
            $model->otryad = Yii::$app->user->identity->name_export;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        //проверка прав файл
        $model = $this->findModel($id);
        if (!\Yii::$app->user->can('OwnSquad', ['post' => $model])) {
            throw new ForbiddenHttpException('Access denied');
        }


        if ($model->load(Yii::$app->request->post())){

            $docs = UploadedFile::getInstance($model, 'docs');
            if ($docs && $docs->tempName) {
                $model->docs = $docs;

            $image_name = $this->randomFileName($model->docs->extension);
            $image_path = 'uploads/documents/'  . date('Y/m/d') . '/' .  $image_name;
			if (file_exists('uploads/documents/'   . '/' . date('Y/m/d'))){
				echo 'файл загружен';
				}
				else
				{
					mkdir('uploads/documents/' . '/' . date('Y/m/d'),0777, true);
					}

			$model->docs->saveAs($image_path);



              $model->docs = $image_path;
            } else {
                $model->docs = $model->getOldAttribute('docs');
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
        $model = $this->findModel($id);
        if (!Yii::$app->user->can('OwnSquad',['post'=>$model])) {
            if (!Yii::$app->user->can('OwnSquad',['post'=>$model]))
            {
                throw new ForbiddenHttpException("Доступ запрещен");
            }
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Squad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return \app\models\Squad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Squad::findOne($id)) !== null) {
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
    
    public function actionDownload($id) {
          $model = $this->findModel($id);

            if (!Yii::$app->user->can('OwnSquad',['post'=>$model]))
            {
                throw new ForbiddenHttpException("Доступ запрещен");
            }
        
        $file = Squad::findOne(['id' => $id]);
        if ($file === null) {
            throw new NotFoundHttpException('Файл не найден');
        }
        return Yii::$app->response->sendFile(Yii::getAlias('@webroot/' . $file->docs));
    }

}

//   $path = \Yii::getAlias('@app/web/uploads/documents/2021/10/12') ;
//   $file = $path . '/5f62ce128a127594abe3f4eb4e2472ce.zip';
// 
//   if (file_exists($file)) {
//       return \Yii::$app->response->sendFile($file);
//   } 
//   throw new \Exception('Файл не найден, удален или отсутствует');
//}



