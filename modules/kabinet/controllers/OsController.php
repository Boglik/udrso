<?php

namespace app\modules\kabinet\controllers;

use app\modules\kabinet\models\Os;
use app\modules\kabinet\models\OsSearch;
use app\modules\kabinet\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * OsController implements the CRUD actions for Os model.
 */
class OsController extends Controller
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
     * Lists all Os models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Os model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException|ForbiddenHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if (!Yii::$app->user->can('OwnSquad',['post'=>$model])) {
            if (!Yii::$app->user->can('OwnSquad',['post'=>$model]))
            {
                throw new ForbiddenHttpException("Доступ запрещен");
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Os model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
     {
        $model = new Os();
      $customer = User::findOne(Yii::$app->user->id); // запрос в таблицу user о том, что мы вставляем данные по id
        if ($model->load(Yii::$app->request->post())){
            $customer->updateCounters(['obr_svyz' => '1']); // обновляем по кулдауну в таблицу * счетчик в +1
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
     * Updates an existing Os model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        if (!Yii::$app->user->can('OwnSquad',['post'=>$model])) {
            if (!Yii::$app->user->can('OwnSquad',['post'=>$model]))
            {
                throw new ForbiddenHttpException("Доступ запрещен");
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Os model.
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
     * Finds the Os model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Os the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Os::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
