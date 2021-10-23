<?php

namespace app\controllers;

use app\modules\admin\models\Pravlenie;
use Yii;
use yii\web\Controller;


class PravlenieController extends Controller
{
    public function actionIndex()
    {   Yii::$app->view->title = "Правление Регионального Отделения | Студенческие Отряды Удмуртской Республики";
        $array = Pravlenie::getPravlenie();
        return $this->render('/site/pravlenie', ['pravlenie' => $array]);

    }

    

    public function actionRegionalnyjShtab()
    {   Yii::$app->view->title = "Региональный Штаб | Студенческие Отряды Удмуртской Республики";
        $array = Pravlenie::getRegStab();
         return $this->render('/site/regstab', ['pravlenie' => $array]);

    }
}