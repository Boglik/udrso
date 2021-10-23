<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\questionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_ustav') ?>

    <?= $form->field($model, 'question') ?>

    <?php // echo $form->field($model, 'question_1') ?>

    <?php // echo $form->field($model, 'question_2') ?>

    <?php // echo $form->field($model, 'question_3') ?>

    <?php // echo $form->field($model, 'question_4') ?>

    <?php // echo $form->field($model, 'question_5') ?>

    <?php // echo $form->field($model, 'question_6') ?>

    <?php // echo $form->field($model, 'question_7') ?>

    <?php // echo $form->field($model, 'question_8') ?>

    <?php // echo $form->field($model, 'question_9') ?>

    <?php // echo $form->field($model, 'question_10') ?>

    <?php // echo $form->field($model, 'question_11') ?>

    <?php // echo $form->field($model, 'question_12') ?>

    <?php // echo $form->field($model, 'question_13') ?>

    <?php // echo $form->field($model, 'question_14') ?>

    <?php // echo $form->field($model, 'question_15') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
