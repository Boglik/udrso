<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SquadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="squad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fio') ?>

    <?= $form->field($model, 'data_rozhdenia') ?>

<!--    --><?//= $form->field($model, 'passport') ?>
<!---->
<!--    --><?//= $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'address_passport') ?>

    <?php // echo $form->field($model, 'adress_prozivania') ?>

    <?php // echo $form->field($model, 'mesto_uchebi') ?>

    <?php // echo $form->field($model, 'tip_uchebi') ?>

    <?php // echo $form->field($model, 'nomer_udostoverenia') ?>

    <?php // echo $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'dolznost') ?>

    <?php  echo $form->field($model, 'vznos') ?>

    <?php  echo $form->field($model, 'chelina') ?>

    <?= $form->field($model, 'mesto_raboti')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
