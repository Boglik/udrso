<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zakaz */
$this->title = 'Обновить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Штабы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'обновить';
?>
<div class="stabi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
