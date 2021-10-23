<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */

$this->title = Yii::t('app', 'Редактировать профиль');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'профиль'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-update">
    <div class="user-form">

        <?php $form = ActiveForm::begin(['id' => 'blog-form', 'options' => ['enctype' => 'multipart/form-data']]);
        ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'сохранить'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'отменить'), ['/profile'], ['class' => 'btn btn-danger']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>