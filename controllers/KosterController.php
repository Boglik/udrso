<?php

namespace app\controllers;

use app\models\Koster;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use Yii;

class KosterController extends Controller
{

   
    public function actionIndex()
    {        Yii::$app->view->title = "Журнал: КОСТЕР+ | Студенческие Отряды Удмуртии";
        $array = Koster::getKoster();
        return $this->render('/site/koster.php', ['koster' => $array]);
        
    }
}