<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Zakaz */

$this->title = 'Обновить заказ: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="zakaz-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
