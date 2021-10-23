<?php

namespace app\modules\kabinet\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


class AppController extends Controller {

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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

            //Доступ только для админа
            [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'update','delete','create'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update','delete','create'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                ],

            ],

            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

public function debug($arr){
    echo '<pre>'. print_r($arr, true) .'</pre>';
}
}
