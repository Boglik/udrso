<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\ChangePasswordForm */

$this->title = Yii::t('app', 'изменить пароль');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'редактировать профиль'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-password-change">

    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'currentPassword')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'newPasswordRepeat')->passwordInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'сохранить'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'отменить'), ['/kabinet/profile'], ['class' => 'btn btn-danger']) ?>
        </div>


        <?php ActiveForm::end(); ?>

    </div>

</div>