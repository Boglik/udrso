<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MeropriyatiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Просмотр';
$this->params['breadcrumbs'][] = ['label' => 'Мероприятие', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <b>&nbsp;<?=$post->title?></a></b>
    </div>
    <div class="panel-body">
        <?=$post->text?><br>
        <br>
        <?= Html::a(Yii::t('app', 'назад'), ['/kabinet/meropriyatia'], ['class' => 'btn btn-danger']) ?>
    </div>
</div>


