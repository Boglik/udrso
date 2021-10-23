<?php

/*
  Контроллер отвечаюший за группы
 */

namespace app\modules\admin\controllers;

use app\models\Cons;
use app\modules\admin\models\Squad;
use app\modules\admin\models\Structura;
use Mpdf\Mpdf;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * SquadController implements the CRUD actions for Squad model.
 */
class SquadController extends Controller {

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

    public function actionExport($id) {
        /////////////////////////////////////////////////
        /////////////////////////ADMIN/////////////////////////////////////////////////
        if (Yii::$app->user->can('admin')) {

            $model = $this->findModel($id);

            $id_user = Squad::find()->select('id_user');
            $pdf_content = $this->renderPartial('export', ['model' => $this->findModel($id), 'model2' => Structura::find()->with('role')->where(['id' => $model->id_user])->one()]);

            $mpdf = new Mpdf();
            $mpdf->WriteHTML($pdf_content);
            $mpdf->Output();
            exit;
        }
                /////////////////////////////////////////////////
        /////////////////////////ADMIN PANEL/////////////////////////////////////////////////
        /////////////////////////REGSTAB/////////////////////////////////////////////////
        //      /////////////////////////REGSTAB/////////////////////////////////////////////////
        /////////////////////////////////////////////////
        /////////////////////////ADMIN PANEL/////////////////////////////////////////////////
        /////////////////////////REGSTAB/////////////////////////////////////////////////
        if (Yii::$app->user->can('regstab')) {

            $model = $this->findModel($id);

            $id_user = Squad::find()->select('id_user');
            $pdf_content = $this->renderPartial('export', ['model' => $this->findModel($id), 'model2' => Structura::find()->with('role')->where(['id' => $model->id_user])->one()]);

            $mpdf = new Mpdf();
            $mpdf->WriteHTML($pdf_content);
            $mpdf->Output();
            exit;
        }
                /////////////////////////REGSTAB/////////////////////////////////////////////////
                /////////////////////////STABI/////////////////////////////////////////////////
        if (Yii::$app->user->can('stabi')) {

            $model = $this->findModel($id);
            if ($model->stabs != Yii::$app->user->identity->role) {
                throw new ForbiddenHttpException('Не разрешено!');
            }
            $id_user = Squad::find()->select('id_user');
            $pdf_content = $this->renderPartial('export', ['model' => $this->findModel($id), 'model2' => Structura::find()->where(['id' => $model->id_user])->one()]);

            $mpdf = new Mpdf();
            $mpdf->WriteHTML($pdf_content);
            $mpdf->Output();
            exit;
        }
    }
        /////////////////////////STABI/////////////////////////////////////////////////
    /*
     * Displays a single Squad model.
     * @param integer $id
     * @return mixed
     */

    public function actionView($id) {
        $model = Squad::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {



            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => 'СПО ' . Yii::$app->view->title = $model->otryad, 'url' => '/admin/otryad?id=' . $model->id_user];

            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name . Yii::$app->view->title = $model->familia];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . Yii::$app->view->title = $model->familia . ' — ' . Cons::KVARTAL_SPISOK . '  —' . Cons::RSO;
        }
        //права доступа на просмотр
        if (Yii::$app->user->can('admin')) {
            $array = Squad::find()->where(['id' => $id])->one();
            return $this->render('view', ['model' => $model]);
        }
        if (Yii::$app->user->can('regstab')) {
            $array = Squad::find()->where(['id' => $id])->one();
            return $this->render('view', ['model' => $model]);
        }

        $model = $this->findModel($id);
        if ($model->stabs != Yii::$app->user->identity->role) {
            throw new ForbiddenHttpException('Не разрешено!');
        }
        //права доступа на просмотр
        $array = Squad::find()->where(['stabs' => Yii::$app->user->identity->role, 'id' => $id])->one();
        return $this->render('view', ['model' => $model]);

        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Squad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        if (Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);
        }
        if (Yii::$app->user->can('regstab')) {
            $model = $this->findModel($id);
        }
        if (Yii::$app->user->can('stabi')) {
            $model = $this->findModel($id);
            if ($model->stabs != Yii::$app->user->identity->role) {
                throw new ForbiddenHttpException('Доступ запрещен');
            }
        }

        $model = Squad::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {

            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => 'СПО ' . Yii::$app->view->title = $model->otryad, 'url' => '/admin/otryad?id=' . $model->id_user];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::EDITOR . '  ' . Yii::$app->view->title = $model->name . Yii::$app->view->title = $model->familia, 'url' => '/admin/squad/view?id=' . $model->id];

            Yii::$app->view->title = Yii::$app->view->title = $model->name . Yii::$app->view->title = $model->familia . ' — ' . Cons::KVARTAL_SPISOK . ' —' . Cons::RSO;
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
     * Deletes an existing Squad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        if (Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);
        }
        if (Yii::$app->user->can('regstab')) {
            $model = $this->findModel($id);
        }
        if (Yii::$app->user->can('stabi')) {
            $model = $this->findModel($id);
            if ($model->stabs != Yii::$app->user->identity->role) {
                throw new ForbiddenHttpException('Доступ запрещен');
            }
        }

        $model = $this->findModel($id);
        $this->findModel($id)->delete();

        return $this->redirect(['/admin/otryad', 'id' => $model->id_user]);
    }

    /**
     * Finds the Squad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Squad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Squad::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModeel($id) {
        if (($modeel = Structura::findOne($id)) !== null) {
            return $modeel;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDownload($id) {
        if (Yii::$app->user->can('admin')) {
            $file = Squad::findOne(['id' => $id]);
        }
        if (Yii::$app->user->can('regstab')) {
            $file = Squad::findOne(['id' => $id]);
        }
        if (Yii::$app->user->can('mehan')) {
            $file = Squad::findOne(['id' => $id, 'stabs' => '1']);
        }
        if (Yii::$app->user->can('udgu')) {
            $file = Squad::findOne(['id' => $id, 'stabs' => '2']);
        }
        if (Yii::$app->user->can('ggpi')) {
            $file = Squad::findOne(['id' => $id, 'stabs' => '3']);
        }
        if (Yii::$app->user->can('egida')) {
            $file = Squad::findOne(['id' => $id, 'stabs' => '4']);
        }
        if ($file === null) {
            throw new NotFoundHttpException('Файл не найден');
        }
        return Yii::$app->response->sendFile(Yii::getAlias('@webroot/' . $file->docs));
    }

}
