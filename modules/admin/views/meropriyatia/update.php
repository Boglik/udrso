<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Meropriyatia */

$this->title = 'Обновить мероприятие: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятие', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'обновить';
?>
<div class="meropriyatia-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
