<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Os */

$this->title = 'Добавить обратную связь';
$this->params['breadcrumbs'][] = ['label' => 'обратная связь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="os-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
