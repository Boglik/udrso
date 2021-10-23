<?php

use app\modules\admin\models\Squad;
use app\models\StabModel;
use app\modules\admin\models\VznosModel;
use app\modules\admin\models\UstavModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

?>

    <div class="squad-view">


    <div class="squad-view"><img alt="logo" src="/web/logo.png" style="float:left; height:150px; width:200px" />
        <p style="margin-left:2.75cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif"><strong> молодежная общероссийская общественная организация</strong> &laquo;<strong>Российские Студенческие Отряды&raquo;</strong></span></span></p>

        <p style="margin-left:8.25cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif">Руководителю Штаба УРО МООО &laquo;РСО&raquo;</span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">С.В. Чиркову</span></span><br />
            <br />
            <span style="font-family:times new roman,times,serif; font-size:12px">от <?= $model->familia ?> <?= $model->name ?> <?= $model->otchestvo ?></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">Дата рождения: <?= $model->data_rozhdenia ?></span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">Место учебы: <?= $model->mesto_uchebi ?></span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">Студента группы: <?= $model->nomer_klass ?></span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">Адрес (постоянная регистрация) с индексом:</span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif"><?= $model->adress_postoyannogo_prozivania ?><br />
Адрес фактического места жительства</span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif"><?= $model->fact_mesto_zitelstva ?></span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">Конт. тел. <?= $model->telefon ?></span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">e-mail _____________________________________</span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">Паспортные данные <?= $model->seria_passporta ?> <?= $model->nomer_passporta ?> <?= $model->kem_vidan_passport ?> <br />
Дата выдачи <?= $model->data_vidacha_passporta ?></span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">Код подразделения: <?= $model->kod_podrazdelenia ?></span></span></p>

        <p style="text-align:center"><span style="font-size:12px"><span style="font-family:times new roman,times,serif"><strong>заявление</strong></span></span></p>

        <p><span style="font-size:12px"><span style="font-family:times new roman,times,serif">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Прошу принять меня в члены МООО &laquo;Российские Студенческие Отряды&raquo; в составе<br />
линейного студенческого отряда <?= $model2->napr ?> <?= $model2->name_otryad ?> вуза <?= $model2->vuz ?>,</span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">города <?= $model2->gorod ?>
                        , региона Удмуртская Республика</span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="checkbox" />&nbsp;&nbsp;<span style="font-size:12px"><span style="font-family:times new roman,times,serif">С уставными и программными документами организации ознакомлен(а) и согласен(а).</span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">Согласен(а) на обработку персональных данных, согласно Федеральному закону от 27 июля 2006 года №152 &laquo;О персональных данных&raquo;, включая сбор, систематизацию, накопление, хранение, уточнение (обновление/изменение), использование, распространение, в том числе передачу, обезличивание, блокирование, уничтожение моих персональных данных в период моего членства в организации.</span></span><br />
            <span style="font-size:12px"><span style="font-family:times new roman,times,serif">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Права, в целях обеспечения защиты персональных данных, ответственность за предоставление ложных сведений о себе, мне разъяснены.<br />
&nbsp; <input type="checkbox" />&nbsp;&nbsp;<span style="font-size:12px"><span style="font-family:times new roman,times,serif">Согласен(а) получать информационную рассылку по электронной почте.</span></span></span></span></p>

        <p style="margin-left:1cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif">&nbsp; &nbsp; &nbsp; Дата ______________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Личная подпись __________________</span></span></p>

        <p style="margin-left:1cm"><em>Заполняется штабом:</em></p>

        <p style="margin-left:1cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif">Вступительный взнос в сумме ____________ рублей уплачен (дата) ______________</span></span></p>

        <p style="margin-left:1cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif">Решение регионального штаба:</span></span></p>

        <p style="margin-left:1cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif">в члены МООО &laquo;РСО&raquo; протокол № ________ от _______________</span></span></p>

        <p style="margin-left:1cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif">Член внесен в реестр членов МООО &laquo;РСО&raquo; (дата) _______________</span></span></p>

        <p style="margin-left:1cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif">Ответственный _____________________________________________</span></span></p>

        <p style="margin-left:1cm"><span style="font-size:12px"><span style="font-family:times new roman,times,serif">Членский билет № ________________ выдан (дата) ______________</span></span></p>

        <p style="margin-left:1cm">&nbsp;</p>


    </div>
<?php
//use yii\helpers\html;
//use yii\grid\GridView;
//?>
<?php //foreach($dataProvider->getModels() as $model) { ?>

<?php //} ?>