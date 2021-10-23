<?php

use app\modules\admin\models\Dolznosti;
use app\modules\admin\models\Stab_category;
use yii\helpers\Html;

use kartik\file\FileInput;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Zayavka */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pravlenie-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'dolznost')
            ->dropDownList(
                    ArrayHelper::map(Dolznosti::find()->all(), 'title', 'title'), 
                    ['prompt'=>'Выбрать категорию']); ?>
        <?= $form->field($model, 'stab')
            ->dropDownList(
                    ArrayHelper::map(stab_category::find()->all(), 'name_stab', 'name_stab'), 
                    ['prompt'=>'Выбрать штаб']); ?>

    <?= $form->field($model, 'images')->widget(FileInput::class,[    'name' => 'input-ru[]',
    
        'language' => 'ru',]);?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'отменить'), ['/zayavka'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
