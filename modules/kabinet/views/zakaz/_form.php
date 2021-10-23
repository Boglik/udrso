<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Zakaz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zakaz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chelinka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'znachki')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atributika')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'primechania')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'text_primechania')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'id_user')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'stab')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'napr')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
