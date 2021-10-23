<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\social */

$this->title = 'Добавить соц акцию';
$this->params['breadcrumbs'][] = ['label' => 'соц акции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
