<?php

use yii\helpers\Html;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Zayavka */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="koster-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'images')->widget(FileInput::class,[    'name' => 'input-ru[]',
    
        'language' => 'ru',]);?>
            <?= $form->field($model, 'files')->widget(FileInput::class,[    'name' => 'input-ru[]',
    
    'language' => 'ru',]);?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/koster'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
