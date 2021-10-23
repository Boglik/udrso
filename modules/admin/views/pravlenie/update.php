<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = 'Обновить информацию о: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Правление', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="zayavka-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
