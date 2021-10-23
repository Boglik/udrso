<?php
/*
Контроллер отвечаюший за заказы
*/
namespace app\modules\admin\controllers;

use app\models\Cons;
use app\modules\admin\models\Zakaz;
use app\modules\admin\models\Zayavka;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * ZakazController implements the CRUD actions for Zakaz model.
 */
class ZakazController extends Controller
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
     * Displays a single Zakaz model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
     $model = Zakaz::find()->where('id = :id')->addParams([':id' => $id])->one();
      if($model){
                 Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
                       Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->otryad, 'url' => '/admin/otryad?id=' . $model->id_user];
      Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAKAZ_SPISOK, 'url' => '/admin/zakaz?id=' . $model->id_user];
      Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->id];
                                Yii::$app->view->title = Yii::$app->view->title = $model->id .' — ' . Cons::ZAKAZ_SPISOK . ' —'. Cons::RSO;
        }

        $model = $this->findModel($id);
                
 if(Yii::$app->user->can('admin')) { 
           $array = Zakaz::find()->where(['id' => $id])->one();
                return $this->render('view', ['model' => $model]);
     
 }
  if(Yii::$app->user->can('regstab')) { 
           $array = Zakaz::find()->where(['id' => $id])->one();
                return $this->render('view', ['model' => $model]);
     
 }
          $array = Zakaz::find()->where(['stabs' => Yii::$app->user->identity->role , 'id' => $id])->one();
                return $this->render('view', ['model' => $model]);
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
                             
        $model = Zakaz::find()->where('id = :id')->addParams([':id' => $id])->one();

       if($model){
                  Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
                               Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->otryad, 'url' => '/admin/otryad?id=' . $model->id_user];
                  Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAKAZ_SPISOK, 'url' => '/admin/zakaz?id=' . $model->id_user];
                             Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->id];
                                 Yii::$app->view->title = Cons::EDITOR  . Yii::$app->view->title = $model->id .' — ' . Cons::ZAKAZ_SPISOK . ' —'. Cons::RSO;
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
     * Deletes an existing Zakaz model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
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
        
        $model = $this->findModel($id);
        $this->findModel($id)->delete();

      return $this->redirect(['/admin/zakaz', 'id' => $model->id_user]);
    }

    /**
     * Finds the Zakaz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zakaz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zakaz::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
