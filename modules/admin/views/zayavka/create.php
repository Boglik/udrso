<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Zayavka */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = ['label' => 'создание заявок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zayavka-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
