<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'руководители', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zayavka-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

