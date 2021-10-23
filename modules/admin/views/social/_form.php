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

    <?= $form->field($model, 'status')
        ->dropDownList(
            ['Неправильно оформлено' => 'Неправильно оформлено',
                'Заполнено не до конца' => 'Заполнено не до конца',
                'Иное' => 'Иное',
                'Оформлено верно',
            ],
            [
                'id' => 'pol',
                'prompt' => '--Выберите статус--',
            ]
        )->label('status')->label(false) ?>
    <?= $form->field($model, 'text_primechania')->textArea(['placeholder' => 'Напишите примечание', 'value'=>''])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
             <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/social/view', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
