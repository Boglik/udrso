<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Личный кабинет';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<link rel='StyleSheet' href='/css/login.css' type='text/css'>
<div id="range1">

    <div class="outer">
        <div class="middle">
            <div class="inner">

                <div class="login-wr">
                    <h2>Вход</h2>
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
                    <div class="form">
                        <?= $form
                            ->field($model, 'username', $fieldOptions1)
                            ->label(false)
                            ->textInput(['placeholder' => $model->getAttributeLabel('Логин')]) ?>
                        <?= $form
                            ->field($model, 'password', $fieldOptions2)
                            ->label(false)
                            ->passwordInput(['placeholder' => $model->getAttributeLabel('пароль')]) ?>
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        <?= Html::submitButton('Авторизация', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>

                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>