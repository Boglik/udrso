<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Meropriyatia */

$this->title = 'Создать мероприятие';
$this->params['breadcrumbs'][] = ['label' => 'мероприятие', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect((Url::to(['login'],302)));
?>
<div class="meropriyatia-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
