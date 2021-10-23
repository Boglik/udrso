<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RequestOtryad */

$this->title = 'Заявки на вступление в отряд: ' . $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Заявки на вступление в отряд', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fio, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="request-otryad-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
