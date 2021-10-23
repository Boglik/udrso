<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php
$this->title = Yii::t('app', 'Редактирование изображения');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'imageFile')->fileInput() ?>

<?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

<?php ActiveForm::end() ?>
