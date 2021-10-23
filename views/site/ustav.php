<?php include 'header.php'; ?>
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $model site\models\Zayavki_na_otryad */
use kartik\datetime\DateTimePicker;
?>
<!-- Modal -->

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="modal-header">
                <span aria-hidden="true">Форма сдачи устава онлайн</span>
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

<?php include 'footer.php';?>