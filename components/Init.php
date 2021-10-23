<?php
namespace app\components;


use yii\base\Component;
use yii\helpers\Url;
use yii\web\ErrorAction;

class Init  extends  Component  {

    public function init() {
        if (\Yii::$app->getUser()->isGuest &&
            \Yii::$app->getRequest()->url !== Url::to(\Yii::$app->getUser()->loginUrl)
        ) {
            \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        parent::init();
    }

    /**
     * {}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }
}