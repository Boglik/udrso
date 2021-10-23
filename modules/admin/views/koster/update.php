<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = 'Обновить Костер+: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'костер', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="koster-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
