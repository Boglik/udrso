<?php
/*
Контроллер отвечаюший за обратную связь
*/
namespace app\modules\admin\controllers;

use app\models\Cons;
use app\modules\admin\models\Social;
use app\modules\admin\models\SocialSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * SocialController implements the CRUD actions for Social model.
 */
class SocialController extends Controller
{

    public $docs;
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
     * Lists all Social models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SocialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Social model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
             //права доступа на просмотр
 if(Yii::$app->user->can('admin')) { 
           $array = Social::find()->where(['id' => $id])->one();
                return $this->render('view', ['squad' => $array]);
     
 }
  if(Yii::$app->user->can('regstab')) { 
           $array = Social::find()->where(['id' => $id])->one();
                return $this->render('view', ['squad' => $array]);
     
 }
                
    $model = $this->findModel( $id );
    if ( $model->stabs!= Yii::$app->user->identity->role ) {
        throw new ForbiddenHttpException( 'Не разрешено!' );
    }
     //права доступа на просмотр
    
        $model = Social::find()->where('id = :id')->addParams([':id' => $id])->one();
        if($model){
           Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
                Yii::$app->view->params['breadcrumbs'][] = ['label' =>  Yii::$app->view->title = $model->otryad];
      Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SOCIAL_SPISOK, 'url' => '/admin/social?id=' . $model->id_user];
      Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->id];
                                Yii::$app->view->title = Yii::$app->view->title = $model->id .' — ' . Cons::SOCIAL_SPISOK . ' —'. Cons::RSO;
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    { //права доступа на редактирование
                                             if(Yii::$app->user->can('admin')) {
                        $model = $this->findModel( $id );

                    }
                              if(Yii::$app->user->can('regstab')) {
                        $model = $this->findModel( $id );

                    }
                             if(Yii::$app->user->can('stabi')) {         
                        $model = $this->findModel( $id );
    if ( $model->stabs != Yii::$app->user->identity->role ) {
        throw new ForbiddenHttpException( 'Доступ запрещен' );
    }
                             }
                             //права доступа на редактирование
                             
                $model = Social::find()->where('id = :id')->addParams([':id' => $id])->one();
        if($model){
           Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
                Yii::$app->view->params['breadcrumbs'][] = ['label' =>  Yii::$app->view->title = $model->otryad];
                  Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SOCIAL_SPISOK, 'url' => '/admin/social?id=' . $model->id_user];
                             Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->id];
                                 Yii::$app->view->title = Yii::$app->view->title = $model->id .' — ' . Cons::SOCIAL_SPISOK . ' —'. Cons::RSO;
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Social model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {        //права доступа на удаление
                                               if(Yii::$app->user->can('admin')) {
                        $model = $this->findModel( $id );

                    }
                              if(Yii::$app->user->can('regstab')) {
                        $model = $this->findModel( $id );

                    }
                             if(Yii::$app->user->can('stabi')) {         
                        $model = $this->findModel( $id );
    if ( $model->stabs != Yii::$app->user->identity->role ) {
        throw new ForbiddenHttpException( 'Доступ запрещен' );
    }
                             }
                             //права доступа на удаление
        $model = $this->findModel($id);
        $this->findModel($id)->delete();

          return $this->redirect(['/admin/social', 'id' => $model->id_user]);
          
    }

    /**
     * Finds the Social model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Social the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Social::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Страница не найдена, возможно, ее щелчком пальца стер Танос или Коронавирус...');
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
