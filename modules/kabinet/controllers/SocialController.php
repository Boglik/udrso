<?php

namespace app\modules\kabinet\controllers;

use app\models\Cons;
use app\modules\kabinet\models\Social;
use app\modules\kabinet\models\SocialSearch;
use app\modules\kabinet\models\User;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * SocialController implements the CRUD actions for social model.
 */
class SocialController extends Controller
{
    public $docs;
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
     * Lists all social models.
     * @return mixed
     */
    public function actionIndex()
    {

    Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::Social_action, 'url' => ['index']];
        Yii::$app->view->title = Cons::Social_action .  $model->id . ' — ' . Cons::RSO;

        $searchModel = new SocialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single social model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //проверка прав файл
        $model = $this->findModel($id);
        if (!\Yii::$app->user->can('OwnSquad', ['post' => $model])) {
            throw new ForbiddenHttpException('Access denied');
        }
               $model = Social::find()->where('id = :id')->addParams([':id' => $id])->one();

        if($model){
    Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::Social_action, 'url' => ['index']];
    Yii::$app->view->params['breadcrumbs'][] = ['label' => '№'  .  Yii::$app->view->title = $model->id];
        Yii::$app->view->title = $model->id  . ' — ' . Cons::Social_action . '  —' . Cons::RSO;
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Creates a new social model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

    Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::Social_action, 'url' => ['index']];
    Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SOCAIL_CREATE];
        Yii::$app->view->title =  Cons::SOCAIL_CREATE . '  — ' . Cons::RSO;

        $model = new Social();
        $customer = User::findOne(Yii::$app->user->id); // запрос в таблицу user о том, что мы вставляем данные по id
        if ($model->load(Yii::$app->request->post())){
            $model->docs = UploadedFile::getInstance($model, 'docs');

         if($model->docs!=null) {
            $image_name = $this->randomFileName($model->docs->extension);
            $image_path = 'uploads/social/'  . date('y/m/d') . '/' .  $image_name;
			if (file_exists('uploads/social/' . '/' . date('y/m/d'))){
				}
				else
				{
					mkdir('uploads/social/' . '/' . date('y/m/d'),0777, true);
					}

				  $model->docs->saveAs($image_path);
                  $model->docs = $image_path;
          }
                       $customer->updateCounters(['action' => '1']); // обновляем по кулдауну в таблицу * счетчик в +1
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
     * Updates an existing social model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
                $model = $this->findModel($id);
        if (!\Yii::$app->user->can('OwnSquad', ['post' => $model])) {
            throw new ForbiddenHttpException('Access denied');
        }
         $model = Social::find()->where('id = :id')->addParams([':id' => $id])->one();

        if($model){
    Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::Social_action, 'url' => ['index']];
    Yii::$app->view->params['breadcrumbs'][] = ['label' => '№'  .  Yii::$app->view->title = $model->id, 'url' => '/kabinet/social/view?id=' . $model->id];
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::BLOG_EDITOR];
        Yii::$app->view->title = Cons::BLOG_EDITOR .  $model->id . ' — ' . Cons::RSO;
        }
        //проверка прав файл
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){

            $docs = UploadedFile::getInstance($model, 'docs');
            if ($docs && $docs->tempName) {
                $model->docs = $docs;

            $image_name = $this->randomFileName($model->docs->extension);
            $image_path = 'uploads/social/'  . date('y/m/d') . '/' .  $image_name;
			if (file_exists('uploads/social/' . '/' . date('y/m/d'))){
				echo 'файл загружен';
				}
				else
				{
					mkdir('uploads/social/' . '/' . date('y/m/d'),0777, true);
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
     * Deletes an existing social model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
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
     * Finds the social model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return social the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = social::findOne($id)) !== null) {
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
