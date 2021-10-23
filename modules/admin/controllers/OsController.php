<?php
/*
Контроллер отвечаюший за обратную связь
*/
        /////////////////////////////////////////////////
        /////////////////////////ADMIN PANEL/////////////////////////////////////////////////
        /////////////////////////REGSTAB/////////////////////////////////////////////////
      /////////////////////////REGSTAB/////////////////////////////////////////////////
namespace app\modules\admin\controllers;

use app\models\Cons;
use app\modules\admin\models\Os;
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
//
//    /**
//     * Lists all Os models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        
//        $searchModel = new OsSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    /**
     * Displays a single Os model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
           
        $model = Os::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {

                           Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
       Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->otryad, 'url' => '/admin/otryad?id=' . $model->id_user];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::OBR_SPISOK . ' ' . Yii::$app->view->title = $model->otryad, 'url' => '/admin/zayavka?id=' . $model->id_user];

            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->title, 'url' => '/admin/zayavka/view?id=' . $model->id];
            Yii::$app->view->title = Yii::$app->view->title = $model->title . ' — ' . Cons::OBR_SPISOK . ' —' . Cons::RSO;
        }
     //права доступа на просмотр
 if(Yii::$app->user->can('admin')) { 
           $array = Os::find()->where(['id' => $id])->one();
                return $this->render('view', ['squad' => $array]);
     
 }
  if(Yii::$app->user->can('regstab')) { 
           $array = Os::find()->where(['id' => $id])->one();
                return $this->render('view', ['squad' => $array]);
     
 }
                
    $model = $this->findModel( $id );
    if ( $model->stabs!= Yii::$app->user->identity->role ) {
        throw new ForbiddenHttpException( 'Не разрешено!' );
    }
     //права доступа на просмотр


        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Os model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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
        $model = Os::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {


      Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name_stab, 'url' => '/admin/' . $model->name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->otryad , 'url' => '/admin/otryad?id=' . $model->id_user];
                 Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::OBR_SPISOK . ' ' .  Yii::$app->view->title = $model->otryad , 'url' => '/admin/os?id=' .$model->id_user];
                 
                  Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::EDITOR . Yii::$app->view->title = $model->title, 'url' => '/admin/os/view?id=' . $model->id];
        Yii::$app->view->title =  Cons::EDITOR .  Yii::$app->view->title = $model->title . ' — ' .  Cons::OBR_SPISOK . ' —'. Cons::RSO;
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

          return $this->redirect(['/admin/otryad', 'id' => $model->id_user]);
          
    }


    /**
     * Finds the Os model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Os the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
  protected function findModel($id) {


      if (($model = Os::findOne($id)) !== null) {
            return $model;
                }
          }

}
