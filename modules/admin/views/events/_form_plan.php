<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <?php
    if($model->end_event) {
        $model->end_event = date("d.m.Y H:i", (integer) $model->end_event);
    }
    echo $form->field($model, 'end_event')->widget(DateTimePicker::className(),[
        'name' => 'end_event',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Ввод окончания даты/времени...'],
        'convertFormat' => true,
        'value'=> date("d.m.Y h:i",(integer) $model->end_event),
        'pluginOptions' => [
            'format' => 'yyyy.MM.dd hh:i',
            'autoclose'=>true,
            'startDate' => 'date()', //самая ранняя возможная дата
            'weekStart'=>1, //неделя начинается с понедельника
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
