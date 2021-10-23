<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Events */

$this->title = 'Создать мероприятие';
$this->params['breadcrumbs'][] = ['label' => 'Календарь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
