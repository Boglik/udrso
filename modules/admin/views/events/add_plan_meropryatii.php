<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php
$this->title = Yii::t('app', 'Загрузка документа');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file')->fileInput() ?>


<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    <?= Html::a(Yii::t('app', 'отменить'), ['/admin/events/'], ['class' => 'btn btn-danger']) ?>
</div>

<?php ActiveForm::end() ?>