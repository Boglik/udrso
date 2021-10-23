<?php

use app\modules\admin\models\Category;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title')
            ->dropDownList(
                    ArrayHelper::map(Category::find()->all(), 'id', 'title'),
                    ['prompt'=>'Выбрать категорию']); ?>
    <!-- <?= $form->field($model, 'anonce')->textInput(['maxlength' => true]) ?> -->


    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            // 'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>
    <?= $form->field($model, 'images')->widget(FileInput::class,[    'name' => 'input-ru[]',

        'language' => 'ru',]);?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/blog/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
