<?php

use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Zayavka */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zayavka-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lider')->textInput(['placeholder' => 'Руководитель акции(Ф.И.О., контактный телефон, адрес)', 'value'=>''])->label(false) ?>
    <?= $form->field($model, 'members')->textArea(['placeholder' => 'Участники акции (Ф.И.О., должность в СО)', 'value'=>''])->label(false) ?>
    <?= $form->field($model, 'annotation')->textArea(['placeholder' => 'Краткая аннотация проекта', 'value'=>''])->label(false) ?>
           
    <?= $form->field($model, 'actual')->textArea(['placeholder' => 'Актуальность социальной акции для Республики', 'value'=>''])->label(false) ?>
    <?= $form->field($model, 'osn_chel_grup')->textArea(['placeholder' => 'Основные целевые группы, на которые направлена акция', 'value'=>''])->label(false) ?>
    <?= $form->field($model, 'chel_actii')->textInput(['placeholder' => 'Основная цель акции', 'value'=>''])->label(false) ?>
    <?= $form->field($model, 'zadachi_actii')->textArea(['placeholder' => 'Задачи акции', 'value'=>''])->label(false) ?>
    <?= $form->field($model, 'itogi')->textArea(['placeholder' => 'Итоги', 'value'=>''])->label(false) ?>
    <?= $form->field($model, 'docs')->widget(FileInput::class,[    'name' => 'input-ru[]',
        'language' => 'ru',]);?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'отменить'), ['/kabinet/zayavka'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
