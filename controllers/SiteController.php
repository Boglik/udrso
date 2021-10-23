<?php

namespace app\controllers;

use app\models\Event;
use app\models\Material;
use app\models\SignupForm;
use app\models\Stabi;
use app\models\Blog;
use app\models\News;
use app\models\Koster;
use app\models\User;
use app\models\Zayavki_na_otryad;
use yii\base\BaseObject;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Otryadi;
use Yii;
use yii\web\ErrorAction;
use yii\web\Response;

class SiteController extends Controller
{
    private $created_date;

    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
                'view' => 'error.php'
            ],
            // ...
        ];
    }
    public function beforeAction($action)
    {
        if ($action->id == 'error') {
            $this->layout = 'error.php';
        }

        return parent::beforeAction($action);
    }
//return $this->render('index.php', ['model' => $model, 'koster' => Koster::getAll(), 'blog' => News::getBlog()]);

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect(['/step']);
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionIndex()

    {
        Yii::$app->view->title = "Студенческие Отряды Удмуртской Республики";
        return $this->render('index', ['koster' => Koster::getAll(), 'blog' => News::getBlog()]);

        }

    public function actionPrivacy()

    {
        Yii::$app->view->title = "Политика кондефициальности - Студенческие Отряды Удмуртской Республики";
        return $this->render('privacy');

        }

    public function actionShtabyVuzov()
    {   Yii::$app->view->title = "Штабы Вузов - Студенческие отряды проводников Удмуртской Республики";
        $array = Koster::getKoster();
        return $this->render('shtaby-vuzov');

    }

    public function actionSpoOtryady()
    {
        Yii::$app->view->title = "СПО - Студенческие педагогические отряды Удмуртской Республики";
           $array = Otryadi::getSpo();
        return $this->render('otryad', ['otryad' => $array]);
    }

    public function actionSsoOtryady()
    {
        Yii::$app->view->title = "ССО - Студенческие строительные отряды Удмуртской Республики";
        $array = Otryadi::getSso();
        return $this->render('otryad', ['otryad' => $array]);
    }

    public function actionSopOtryady()
    {
        Yii::$app->view->title = "СОП - Студенческие отряды проводников Удмуртской Республики";
        $array = Otryadi::getSop();
        return $this->render('otryad', ['otryad' => $array]);
    }

    public function actionSservoOtryady()
    {
        Yii::$app->view->title = "ССерО - Сервисные отряды Удмуртской Республики";
        $array = Otryadi::getServ();
        return $this->render('otryad', ['otryad' => $array]);
    }

    public function actionSmoOtryady()
    {
        Yii::$app->view->title = "СМО - Студенческие медицинские Отряды Удмуртской Республики";
        $array = Otryadi::getSmo();
        return $this->render('otryad.php', ['otryad' => $array]);
    }

    public function actionSvoOtryady()
    {
        Yii::$app->view->title = "СВО - Студенческие волонтерские отряды Удмуртской Республики";
        $array = Otryadi::getSvo();
        return $this->render('otryad.php', ['otryad' => $array]);
    }

    public function actionKsivOtryad()
    {
        Yii::$app->view->title = "Клуб стариков и ветеранов - Студенческие Отряды Удмуртской Республики";
        $array = Otryadi::getKsiv();
        return $this->render('ksiv');
    }

    public function actionOtryady($slug)
    {
        if($array = Otryadi::find()->where(['alias' => $slug])->one()){
            return $this->render('info.php', [
                'otryad' => $array
            ]);
        }
        throw new NotFoundHttpException('Не найдено такой новости,  может под стол закатилась, мы поищем завтра.');
     }

    public function actionStabMehan()
    {    Yii::$app->view->title = "Штаб МЕХАН | Студенческие Отряды Удмуртской Республики";
        $array = Stabi::getStabMehan();
        return $this->render('stab-mehan.php', ['item' => $array]);
     }

     public function actionStabUdgu()
     {   Yii::$app->view->title = "Штаб УДГУ | Студенческие Отряды Удмуртской Республики";
         $array = Stabi::getStabUdgu();
         return $this->render('stab-udgu.php', ['item' => $array]);
      }

      public function actionStabGgpi()
      {   Yii::$app->view->title = "Штаб ГГПИ | Студенческие Отряды Удмуртской Республики";
          $array = Stabi::getStabGgpi();
          return $this->render('stab-ggpi.php', ['item' => $array]);
       }

       public function actionStabEgida()
       {   Yii::$app->view->title = "Штаб ЭГИДА | Студенческие Отряды Удмуртской Республики";
           $array = Stabi::getStabEgida();
           return $this->render('stab-egida.php', ['item' => $array]);
        }

    public function actionLetopis()
    {
        Yii::$app->view->title = "История - Студенческие Отряды Удмуртской Республики";
        return $this->render('letopis.php');
    }
    public function actionPlanMeropriyatij()
    {
        Yii::$app->view->title = "Мероприятия - Студенческие Отряды Удмуртской Республики";

        return $this->render('plan');
    }
//    public function actionMaterial()
//
//    {   $array = Material::getMaterials();
//        Yii::$app->view->title = "Документы | Студенческие Отряды Удмуртской Республики";
//        return $this->render('material', ['material' => $array]);
//    }
//
////    public function actionMaterials()
////    {
////
////            Yii::$app->view->title = "Документы | Студенческие Отряды Удмуртской Республики";
////            return $this->render('ksiv');
////    }
//    public function actionMaterials($slug)
//    {
//        if($model = Material::find()->where(['alias' => $slug])->one()){
//            Yii::$app->view->title = "Студенческие Отряды Удмуртской Республики";
//            return $this->render('material_info', [ 'model' => $model]);
//        }
//    }
    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}