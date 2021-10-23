<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Squad */

$this->title = 'Обновить список: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cписок отряда', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="squad-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
