<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zayavka */

$this->title = 'Создать заявку';
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zayavka-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

