<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\frontend\models\News */

$this->title = 'Создать новость';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect((Url::to(['login'],302)));
?>
<div class="news-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
