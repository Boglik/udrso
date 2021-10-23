<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */
$this->title = 'Создать профиль отряда';
$this->params['breadcrumbs'][] = ['label' => 'Список студенческих отрядов УР', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect((Url::to(['login'],302)));
?>
<div class="user-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
