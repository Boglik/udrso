<?php

/*
  Контроллер отвечаюший за пагинацию и работу с отрядами(заявки, списки)
 */

namespace app\modules\admin\controllers;

use app\models\Cons;
use app\modules\admin\models\OsSearch;
use app\modules\admin\models\OtryadSearch;
use app\modules\admin\models\SocialSearch;
use app\modules\admin\models\User;
use app\modules\admin\models\ViezdSearch;
use app\modules\admin\models\ZakazSearch;
use app\modules\admin\models\ZayavkaSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class DefaultController extends Controller {

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
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STABI];
        Yii::$app->view->title = Cons::STABI . '— ' . Cons::RSO;
        return $this->render('../default/squad');
    }

    public function actionSquad() {
        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                throw new ForbiddenHttpException('Доступ запрещен');
            }
        }
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STABI];
        Yii::$app->view->title = Cons::STABI . '— ' . Cons::RSO;
        return $this->render('../default/squad');
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды механ                                                                  //
/////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function actionMehan() {
        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('mehan')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STAB_MEHAN];
        Yii::$app->view->title = Cons::STAB_MEHAN . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '1'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionMehanSpo() {
        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('mehan')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SPOMEHAN];
        Yii::$app->view->title = Cons::SPOMEHAN . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '1', 'id_direction' => '1'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionMehanSop() {
        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('mehan')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SOPMEHAN];
        Yii::$app->view->title = Cons::SOPMEHAN . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '1', 'id_direction' => '3'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionMehanSso() {
        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('mehan')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SSOMEHAN];
        Yii::$app->view->title = Cons::SSOMEHAN . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '1', 'id_direction' => '2'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды механ                                                                  //
/////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды удгу                                                                          //
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function actionUdgu() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('udgu')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STAB_UDGU];
        Yii::$app->view->title = Cons::STAB_UDGU . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '2'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionUdguSpo() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('udgu')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SPOUDGU];
        Yii::$app->view->title = Cons::SPOUDGU . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '2', 'id_direction' => '1'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionUdguSop() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('udgu')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SOPUDGU];
        Yii::$app->view->title = Cons::SOPUDGU . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '2', 'id_direction' => '3'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionUdguSso() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('udgu')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SSOUDGU];
        Yii::$app->view->title = Cons::SSOUDGU . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '2', 'id_direction' => '2'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionUdguServso() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('udgu')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SERVUDGU];
        Yii::$app->view->title = Cons::SERVUDGU . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '2', 'id_direction' => '4'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды удгу                                                                          //
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды ггпи                                                                            //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function actionGgpi() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('ggpi')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }


        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STAB_GGPI];
        Yii::$app->view->title = Cons::STAB_GGPI . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '3'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionGgpiSpo() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('ggpi')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }


        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SPOGGPI];
        Yii::$app->view->title = Cons::SPOGGPI . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '3', 'id_direction' => '1'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionGgpiSop() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('ggpi')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }


        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SOPGGPI];
        Yii::$app->view->title = Cons::SOPGGPI . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '3', 'id_direction' => '3'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionGgpiSso() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('ggpi')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }


        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SSOGGPI];
        Yii::$app->view->title = Cons::SSOGGPI . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '3', 'id_direction' => '2'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды ггпи                                                                            //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды эгида                                                                                 //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function actionEgida() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('egida')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SPOEGIDA];
        Yii::$app->view->title = Cons::STAB_EGIDA . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '4'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionEgidaSpo() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('egida')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SPOEGIDA];
        Yii::$app->view->title = Cons::SPOEGIDA . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '4', 'id_direction' => '1'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionEgidaSop() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('egida')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }


        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SOPEGIDA];
        Yii::$app->view->title = Cons::SOPEGIDA . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '4', 'id_direction' => '3'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionEgidaSmo() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {
                if (!\Yii::$app->user->can('egida')) {
                    throw new ForbiddenHttpException('Access denied');
                }
            }
        }


        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SMOEGIDA];
        Yii::$app->view->title = Cons::SMOEGIDA . ' —  ' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '4', 'id_direction' => '6'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды эгида                                                                                 //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды без штаба                                                                          //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function actionNoStab() {

        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {

                throw new ForbiddenHttpException('Access denied');
            }
        }

        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STABI, 'url' => '/admin/squad'];
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::BEZ_STABA];
        Yii::$app->view->title = Yii::$app->view->title = $model->name . Cons::BEZ_STABA . ' —' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '5'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionNoStabSpo() {
        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {

                throw new ForbiddenHttpException('Access denied');
            }
        }
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STABI, 'url' => '/admin/squad'];
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::BSPO];
        Yii::$app->view->title = Cons::BSPO . ' —' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '5', 'id_direction' => '1'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionNoStabSso() {
        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {

                throw new ForbiddenHttpException('Access denied');
            }
        }
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STABI, 'url' => '/admin/squad'];
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::BSSO];
        Yii::$app->view->title = Cons::BSSO . ' —' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '5', 'id_direction' => '2'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

    public function actionNoStabSvo() {
        if (!\Yii::$app->user->can('admin')) {
            if (!\Yii::$app->user->can('regstab')) {

                throw new ForbiddenHttpException('Access denied');
            }
        }
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::STABI, 'url' => '/admin/squad'];
        Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::BSVO];
        Yii::$app->view->title = Cons::BSVO . ' —' . Cons::RSO;
        $val = User::find()->where(['id_stab' => '5', 'id_direction' => '5'])->all();
        return $this->render('../default/squad_info', ['getspo' => $val]);
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                        отряды штаба                                                                                 //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// выездной список
    public function actionViezd($id) {
        $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {


            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::VIEZD_SPISOK];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::VIEZD_SPISOK . ' —' . Cons::RSO;
        }

        $searchModel = new ViezdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('../squad/viezd', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /// отряды
    public function actionOtryad($id) {
        $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {

            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name, 'url' => '/admin/otryad?id=' . $model->id];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name . ' — ' . Cons::KVARTAL_SPISOK];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::KVARTAL_SPISOK . ' —' . Cons::RSO;
        }

        $searchModel = new OtryadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('../squad/otryad', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionZayavka($id) {
        $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {


            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name, 'url' => '/admin/otryad?id=' . $model->id];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAYAVKI_SPISOK . ' ' . Yii::$app->view->title = $model->name];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::ZAYAVKI_SPISOK . ' —' . Cons::RSO;
        }

        $searchModel = new ZayavkaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('../zayavka/zayavka', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSocial($id) {
        $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {


            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name, 'url' => '/admin/otryad?id=' . $model->id];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::SOCIAL_SPISOK . ' ' . Yii::$app->view->title = $model->name];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::SOCIAL_SPISOK . ' —' . Cons::RSO;
        }

        $searchModel = new SocialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('../social/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOs($id) {
        $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {


            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name, 'url' => '/admin/otryad?id=' . $model->id];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::OBR_SPISOK];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::OBR_SPISOK . ' —' . Cons::RSO;
        }

        $searchModel = new OsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('../os/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionZakaz($id) {
        $model = User::find()->where('id = :id')->addParams([':id' => $id])->one();

        if ($model) {


            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title . $model->name_stab, 'url' => '/admin/' . $model->stab_name_eng];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Yii::$app->view->title = $model->name, 'url' => '/admin/otryad?id=' . $model->id];
            Yii::$app->view->params['breadcrumbs'][] = ['label' => Cons::ZAKAZ_SPISOK];
            Yii::$app->view->title = Yii::$app->view->title = $model->name . ' — ' . Cons::ZAKAZ_SPISOK . ' —' . Cons::RSO;
        }

        $searchModel = new ZakazSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('../zakaz/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /////////////////////////////////////////////////////////////ОТРЯДЫ БЕЗ ШТАБА////////////////////////////////////////////
    /// отряды
    /**
     * Login action.
     *
     * @return string
     */
//    public function actionLogin() {
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new Admin();
//        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
//            return $this->goBack();
//        } else {
//            return $this->render('login', [
//                        'model' => $model,
//            ]);
//        }
//    }

    /**
     * Logout action.
     *
     * @return string
     */
    public  function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
