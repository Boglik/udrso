<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Os */

$this->title = 'Обновить обратную связь: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Обратная связь', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="os-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
