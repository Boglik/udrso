<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequestOtryad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-otryad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'mesto_uchebi')->textInput(['maxlength' => true]) ?>
    <?php   if(Yii::$app->user->can('admin')) { ?>
    <?= $form->field($model, 'request')
        ->dropDownList(
            ['Штаб «Механ»' => 'Штаб «Механ»', 'Штаб УдГУ' => 'Штаб УдГУ','Штаб ГГПИ'=>'Штаб ГГПИ',
                'Штаб «Эгида»'=>'Штаб «Эгида»'],
            [
                'id' => 'dolznost',
                'prompt' => '--выберите--',
            ]
        )->label('Назначить') ?>
   <?php }  ?>
    <?php   if(Yii::$app->user->can('regstab')) { ?>
        <?= $form->field($model, 'request')
            ->dropDownList(
                ['Штаб «Механ»' => 'Штаб «Механ»', 'Штаб УдГУ' => 'Штаб УдГУ','Штаб ГГПИ'=>'Штаб ГГПИ',
                    'Штаб «Эгида»'=>'Штаб «Эгида»'],
                [
                    'id' => 'dolznost',
                    'prompt' => '--выберите--',
                ]
            )->label('Назначить') ?>
    <?php }  ?>
    <?php   if(Yii::$app->user->can('mehan')) { ?>
        <?= $form->field($model, 'request')
            ->dropDownList(
                ['Штаб «Механ»' => 'Штаб «Механ»'],
                [
                    'id' => 'dolznost',
                    'prompt' => '--выберите--',
                ]
            )->label('Назначить') ?>
    <?php }  ?>
    <?php   if(Yii::$app->user->can('udgu')) { ?>
        <?= $form->field($model, 'request')
            ->dropDownList(
                ['Штаб УдГУ' => 'Штаб УдГУ'],
                [
                    'id' => 'dolznost',
                    'prompt' => '--выберите--',
                ]
            )->label('Назначить') ?>
    <?php }  ?>
    <?php   if(Yii::$app->user->can('ggpi')) { ?>
        <?= $form->field($model, 'request')
            ->dropDownList(
                ['Штаб ГГПИ' => 'Штаб ГГПИ'],
                [
                    'id' => 'dolznost',
                    'prompt' => '--выберите--',
                ]
            )->label('Назначить') ?>
    <?php }  ?>
    <?php   if(Yii::$app->user->can('ggpi')) { ?>
        <?= $form->field($model, 'request')
            ->dropDownList(
                ['Штаб ЭГИДА' => 'Штаб ЭГИДА'],
                [
                    'id' => 'dolznost',
                    'prompt' => '--выберите--',
                ]
            )->label('Назначить') ?>
    <?php }  ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
