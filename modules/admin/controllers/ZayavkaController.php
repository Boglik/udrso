<?php

/*
  Контроллер отвечаюший за заявки на мероприятие
 */

namespace app\modules\admin\controllers;

use app\components\PostPermission;
use app\models\Cons;
use app\modules\admin\models\Zayavka;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * ZayavkaController implements the CRUD actions for Zayavka model.
 */
class ZayavkaController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Displays a single Zayavka model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        
        $model = Zayavka::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {

                           Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
       Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->otryad, 'url' => '/admin/otryad?id=' . $model->id_user];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAYAVKI_SPISOK . ' ' . Yii::$app->view->title = $model->otryad, 'url' => '/admin/zayavka?id=' . $model->id_user];

            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->title, 'url' => '/admin/zayavka/view?id=' . $model->id];
            Yii::$app->view->title = Yii::$app->view->title = $model->title . ' — ' . Cons::KVARTAL_SPISOK . ' —' . Cons::RSO;
        }
     //права доступа на просмотр
 if(Yii::$app->user->can('admin')) { 
           $array = Zayavka::find()->where(['id' => $id])->one();
                return $this->render('view', ['squad' => $array]);
     
 }
  if(Yii::$app->user->can('regstab')) { 
           $array = Zayavka::find()->where(['id' => $id])->one();
                return $this->render('view', ['squad' => $array]);
     
 }
                
    $model = $this->findModel( $id );
    if ( $model->stabs!= Yii::$app->user->identity->role ) {
        throw new ForbiddenHttpException( 'Не разрешено!' );
    }
     //права доступа на просмотр

          $array = Zayavka::find()->where(['stabs' => Yii::$app->user->identity->role , 'id' => $id])->one();
                return $this->render('view', ['squad' => $array]);
    }

    /**
     * Updates an existing Zayavka model.
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
//        $customer = User::findOne(Yii::$app->user->id); // запрос в таблицу user о том, что мы вставляем данные по id
            $model = Zayavka::find()->where('id = :id')->addParams([':id' => $id])->one();
        
        if ($model) {

                           Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
       Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->otryad, 'url' => '/admin/otryad?id=' . $model->id_user];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAYAVKI_SPISOK . ' ' . Yii::$app->view->title = $model->otryad, 'url' => '/admin/zayavka?id=' . $model->id_user];

            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::EDITOR . Yii::$app->view->title = $model->title, 'url' => '/admin/zayavka/view?id=' . $model->id];
            Yii::$app->view->title = Yii::$app->view->title = $model->title . ' — ' . Cons::KVARTAL_SPISOK . ' —' . Cons::RSO;
        }


    
        if ($model->load(Yii::$app->request->post())){
//                                   $id = $model->id_user;
//            $customer = User::find()->where('id = :id', [':id' => $id])->one();
//
//            $customer->updateCounters(['zayavki_spisok' => '-1']); // обновляем по кулдауну в таблицу * счетчик в +1
   
            $model->save();

                        return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                               'model' => $model,


        ]);
    }

    /**
     * Deletes an existing Zayavka model.
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

    public function actionDownload($id) {
        $file = Zayavka::findOne(['id' => $id]);
        if ($file === null) {
            throw new NotFoundHttpException('Файл не найден');
        }
        return Yii::$app->response->sendFile(Yii::getAlias('@webroot/' . $file->docs));
    }

    /**
     * Finds the Zayavka model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zayavka the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
  protected function findModel($id) {


      if (($model = Zayavka::findOne($id)) !== null) {
            return $model;
                }
          }
  
}
