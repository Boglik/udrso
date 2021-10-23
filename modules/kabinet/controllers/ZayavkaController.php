<?php

namespace app\modules\kabinet\controllers;

use app\models\Cons;
use app\models\User;
use app\modules\kabinet\models\Zayavka;
use app\modules\kabinet\models\ZayavkaSearch;
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
class ZayavkaController extends Controller
{

    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Squad models.
     * @return mixed
     */
    public function actionIndex()
    {


  
    Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAYAVKI_SPISOK, 'url' => ['index']];
        Yii::$app->view->title =  Cons::ZAYAVKI_SPISOK . '  — ' . Cons::RSO;
       
        $searchModel = new ZayavkaSearch();
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
         $model = Zayavka::find()->where('id = :id')->addParams([':id' => $id])->one();

        if($model){
    Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAYAVKI_SPISOK, 'url' => ['index']];
    Yii::$app->view->params['breadcrumbs'][] = ['label' =>  Yii::$app->view->title = $model->title, 'url' => '/kabinet/zayavka/view?id=' . $model->id];
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAYAVKI_SPISOK];
        Yii::$app->view->title = $model->title . ' — ' . Cons::RSO;
        }
        $model = $this->findModel($id);
    
            if (!Yii::$app->user->can('OwnSquad',['post'=>$model]))
            {
                throw new ForbiddenHttpException("Доступ запрещен");
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
        $model = new Zayavka();
        $customer = User::findOne(Yii::$app->user->id); // запрос в таблицу user о том, что мы вставляем данные по id

        if ($model->load(Yii::$app->request->post())){
            $model->docs = UploadedFile::getInstance($model, 'docs');

         if($model->docs!=null) {
            $image_name = $this->randomFileName($model->docs->extension);
            $image_path = 'uploads/zayavka/'  . date('y/m/d') . '/' .  $image_name;
			if (file_exists('uploads/zayavka/' . '/' . date('y/m/d'))){
				echo 'файл загружен';
				}
				else
				{
					mkdir('uploads/zayavka/' . '/' . date('y/m/d'),0777, true);
					}

				  $model->docs->saveAs($image_path);
                  $model->docs = $image_path;
          }         $model->data = date("d.m.Y");
                $customer->updateCounters(['zayavki_spisok' => '1']); // обновляем по кулдауну в таблицу * счетчик в +1
            $model->id_user = Yii::$app->user->id; // Модель вставляет в ай-юзер данные айди
            $model->stabs = Yii::$app->user->identity->id_stab; // В поле штаб, которая находится в таблице Squad - вставляется данные из ай-штаю таблицы  user
            $model->name_stab = Yii::$app->user->identity->name_stab; // в поле name_stab  из таблицы squad вставляется данная из таблицы user поля name-stab
            $model->name_eng = Yii::$app->user->identity->stab_name_eng; // Здесь все берется из таблицы юзер, направление и нэйм - и вставляется в соответствющие поля
            $model->otryad = Yii::$app->user->identity->name;
            $model->save();
             $customer->save();
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
                 $model = Zayavka::find()->where('id = :id')->addParams([':id' => $id])->one();

        if($model){
    Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAYAVKI_SPISOK, 'url' => ['index']];
    Yii::$app->view->params['breadcrumbs'][] = ['label' =>  Yii::$app->view->title = $model->title, 'url' => '/kabinet/zayavka/view?id=' . $model->id];
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAYAVKI_SPISOK];
        Yii::$app->view->title =  $model->title . ' — ' . Cons::ZAYAVKI_SPISOK . ' — ' . Cons::RSO;
        }
        //проверка прав файл
        $model = $this->findModel($id);
        if (!Yii::$app->user->can('OwnSquad',['post'=>$model])) {
            if (!Yii::$app->user->can('OwnSquad',['post'=>$model]))
            {
                throw new ForbiddenHttpException("Доступ запрещен");
            }
        }

        if ($model->load(Yii::$app->request->post())){

            $docs = UploadedFile::getInstance($model, 'docs');
            if ($docs && $docs->tempName) {
                $model->docs = $docs;

                $image_name = $this->randomFileName($model->docs->extension);
                $image_path = 'uploads/zayavka/' . $image_name;
                if (file_exists('uploads/zayavka/' . '/' . date('y/m/d'))){
				echo 'файл загружен';
				}
				else
				{
					mkdir('uploads/zayavka/' . '/' . date('y/m/d'),0777, true);
					}

                $model->docs->saveAs($image_path);

                $model->docs = $image_path;
            } else {
                $model->docs = $model->getOldAttribute('file');
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
     * @return Zayavka the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zayavka::findOne($id)) !== null) {
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
