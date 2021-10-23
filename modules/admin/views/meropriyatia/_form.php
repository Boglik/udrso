<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Meropriyatia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meropriyatia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anonce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>
    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'dataend')->textInput(['maxlength' => true]) ?>


<!--    --><?//= $form->field($model, 'id_user')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <a type="btn btn-danger" onclick="javascript:history.back(); return false;"><div class = 'btn btn-danger'>Отменить</div></a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
