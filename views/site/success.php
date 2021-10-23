<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $model site\models\Zayavki_na_otryad */
use kartik\datetime\DateTimePicker;
?>

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) { ?>

    <?php
    $this->registerJs(
        "$('#myModalSendOk').modal('show');",
        yii\web\View::POS_READY
    );
    ?>

    <!-- Modal -->
    <div class="modal fade" id="myModalSendOk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="text_modal"><p>Спасибо, ваше заявка успешно отправлена.</p> <p>Теперь вы можете закрыть окно.</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'familia')->textInput(['placeholder' => 'Фамилия', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'otchestvo')->textInput(['placeholder' => 'Отчество', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'telefon')->textInput(['placeholder' => '89', 'value'=>''])->label(false) ?>
              <?= $form->field($model, 'data')->textInput(['placeholder' => 'Дата рождения', 'value'=>''])->label(false)?>
                <?= $form->field($model, 'city')->textInput(['placeholder' => 'Город', 'value'=>''])->label(false)?>

                <?= $form->field($model, 'mesto_uchebi')->textInput(['placeholder' => 'Место учебы', 'value'=>''])->label(false) ?>
                <input name="PERSONAL" type="checkbox" unchecked required><label><div class="soglasie">&nbsp;&nbsp;Подтверждаю согласие на обработку персональных данных</div></label>
            </div>

            <div class="modal-footer">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>