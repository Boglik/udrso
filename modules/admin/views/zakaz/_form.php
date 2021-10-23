<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zakaz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zakaz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chelinka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'znachki')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atributika')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'primechania')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'status_zakaza')
        ->dropDownList(
            ['1' => 'Заказ в обработке', '2' => 'Заказ выполнен','3'=>'Заказ отклонен',],
        
            [
                'id' => 'status_zakaza',
 
                'prompt' => '--выберите--',
            ]
        )->label('Статус заказа') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
          <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/zakaz/view', 'id' => $model->id    ], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
