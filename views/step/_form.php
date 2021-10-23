<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\base\Model;

/* @var $this yii\web\View */
/* @var $model frontend\models\Squad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="squad-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'familia')->textInput(['placeholder' => 'Фамилия', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'otchestvo')->textInput(['placeholder' => 'Отчество', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'telefon')->textInput(['placeholder' => '89', 'value'=>''])->label(false) ?>
              <?= $form->field($model, 'data')->textInput(['placeholder' => 'Дата рождения', 'value'=>''])->label(false)?>
                <?= $form->field($model, 'city')->textInput(['placeholder' => 'Город', 'value'=>''])->label(false)?>


    <?= $form->field($model, 'mesto_uchebi')
        ->dropDownList(
            ['ФГБОУ ВО «ИжГТУ»' => 'ФГБОУ ВО «ИжГТУ»',
                'ФГБОУ ВО «УдГУ»' => 'ФГБОУ ВО «УдГУ»',
                'ФГБОУ ВО «ГГПИ»' => 'ФГБОУ ВО «ГГПИ»',
                'ФГБОУ ВО «Эгида»' =>'ФГБОУ ВО «Эгида»',
                'Школа' =>'Школа',
                'Колледж' => 'Колледж',
                'Техникум' => 'Техникум',
                'Не учится' => 'Не учится'],
            [
                'id' => 'mesto_uchebi',
                'prompt' => '--выберите--',
                '0.345' => ['selected ' => true], // у буржуев взял - не работает
                'value' => '0.345' // аналогично
            ]
        )->label('Место учебы') ?>
    <?= $form->field($model, 'tip_uchebi')
        ->dropDownList(
            ['Очная' => 'Очная', 'Заочная' => 'Заочная'],
            [
                'id' => 'tip_uchebi',
                'prompt' => '--выберите--',
                '0.345' => ['selected ' => true], // у буржуев взял - не работает
                'value' => '0.345' // аналогично
            ]
        )->label('Тип учебы') ?>

    <?= $form->field($model, 'nomer_udostoverenia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dolznost')
        ->dropDownList(
            ['Командир' => 'Командир', 'Комиссар' => 'Комиссар','Методист/Мастер'=>'Методист/Мастер',
                'Кандидат'=>'Кандидат','Боец'=>'Боец','Старик'=>'Старик'],
            [
                'id' => 'dolznost',
                'prompt' => '--выберите--',
                '0.345' => ['selected ' => true], // у буржуев взял - не работает
                'value' => '0.345' // аналогично
            ]
        )->label('Должность') ?>

    <?= $form->field($model, 'chelina')
        ->dropDownList(
            ['Да' => 'Да', 'Нет' => 'Нет'],
            [
                'id' => 'chelina',
                'prompt' => '--выберите--',
                '0.345' => ['selected ' => true], // у буржуев взял - не работает
                'value' => '0.345' // аналогично
            ]
        )->label('Едет ли на целину') ?>

    <?= $form->field($model, 'mesto_raboti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'docs')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'отменить'), ['/squad/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
