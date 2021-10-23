<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model app\models\Zayavka */
/* @var $form ActiveForm */
?>

<div class="zayavka-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]) ?>
<?= $form->field($model, 'status')
        ->dropDownList(
            ['В обработке' => 'В обработке', 'Отклонить' => 'Отклонить','Заявка принята'=>'Заявка принята'],
            [
                'prompt' => '--выберите статус--',
            ]
        )->label('Статус') ?>
        <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                   <?= Html::a(Yii::t('app', 'Отменить'), ['/admin/zayavka/view', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
