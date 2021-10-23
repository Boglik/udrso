<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Squad */

$this->title = 'Добавить человека в список отряда';
$this->params['breadcrumbs'][] = ['label' => 'список отряда', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'добавить'];
?>
<div class="squad-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
