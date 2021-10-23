<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\User */

$this->title = 'Регистрация на сайте - Студенческие Отряды Удмуртской Республики';

?>

<link rel='StyleSheet' href='/assets/css/login.css' type='text/css'>
<div id="range1">

    <div class="outer">
        <div class="middle">
            <div class="inner">

                <div class="login-wr">
                    <h2>Регистрация</h2>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false)
                        ->textInput(['placeholder' => $model->getAttributeLabel('Логин')]) ?>
                    <?= $form->field($model, 'email')->label(false)
                        ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
                    <?= $form->field($model, 'password')->passwordInput()->label(false)
                        ->textInput(['placeholder' => $model->getAttributeLabel('Пароль')]) ?>

                    <div class="form-group">
                        <div align="center"><input name="PERSONAL" type="checkbox" unchecked required>&nbsp;&nbsp;<a href="https://udrso.ru/privacy">Подтверждаю согласие на обработку персональных данных</a></div><br>
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
