<?php

use app\modules\admin\models\Category;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_category')
        ->dropDownList(
            ArrayHelper::map(Category::find()->all(), 'id', 'title'),
            ['prompt'=>'Выбрать категорию']); ?>
    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            // 'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/material/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
