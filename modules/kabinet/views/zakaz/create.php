<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Zakaz */

$this->title = 'Сформировать заказ';
$this->params['breadcrumbs'][] = ['label' => 'заказ атрибутики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zakaz-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
