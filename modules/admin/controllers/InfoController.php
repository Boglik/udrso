<?php
/*
Контроллер отвечаюший за вывод информации об отрядах на сайт
*/
namespace app\modules\admin\controllers;

use app\models\Cons;
use app\modules\admin\models\Info;
use app\modules\admin\models\InfoSearch;
use app\modules\admin\models\Squad;
use app\modules\admin\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;


class InfoController extends Controller
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Zakaz models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {


                       Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::INFO];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::INFO . ' —' . Cons::RSO;
        }
        $searchModel = new InfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Zakaz model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {


                       Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
              Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name , 'url' => '/admin/otryad?id=' . $model->id];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::INFO];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::INFO . ' —' . Cons::RSO;
        }

        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Updates an existing Zakaz model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
      $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {

           Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name , 'url' => '/admin/otryad?id=' . $model->id];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::EDITOR_INFO];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::EDITOR_INFO . ' —' . Cons::RSO;
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Zakaz model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (!Yii::$app->user->can('stabi',['post'=>$model])) {
            if (!Yii::$app->user->can('stabi',['post'=>$model]))
            {
                throw new ForbiddenHttpException("Доступ запрещен");
            }
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Zakaz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Squad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Info::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
