<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Ustav;
use frontend\models\Question;
/* @var $this yii\web\View */
/* @var $model frontend\models\Squad */
/* @var $model frontend\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Онлайн запись в УРО МООО РСО</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@400;700&display=swap');

html {
  height: 100%;
  min-height:800px;
}
body {
  background: url('https://i.pinimg.com/originals/48/79/86/487986c17560a8ed1afdc55e480e5be2.png');
  background-size:cover;
  background-repeat:no-repeat;
  text-align: center;
 font-family: 'Noto Sans', sans-serif;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

h1{
  font-weight:400;
  padding-top:0;
  margin-top:0;
  font-family: 'Roboto Slab', serif;
}

#svg_form_time {
  height: 15px;
  max-width: 80%;
  margin: 40px auto 20px;
  display: block;
}

#svg_form_time circle,
#svg_form_time rect {
  fill: white;
}

.button {
  background: rgb(237, 40, 70);
  border-radius: 5px;
  padding: 15px 25px;
  display: inline-block;
  margin: 10px;
  font-weight: bold;
  color: white;
  cursor: pointer;
  box-shadow:0px 2px 5px rgb(0,0,0,0.5);
}

.disabled {
  display:none;
}

section {
  padding: 50px ;
  max-width: 800px;
  margin: 30px auto;
  background:white;
  background:rgba(255,255,255,0.9);
  backdrop-filter:blur(10px);
  box-shadow:0px 2px 10px rgba(0,0,0,0.3);
  border-radius:5px;
  transition:transform 0.2s ease-in-out;
}


input {
  width: 100%;
  margin: 7px 0px;
  display: inline-block;
  padding: 12px 25px;
  box-sizing: border-box;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 1em;
  font-family:inherit;
  background:white;
}

p{
  text-align:justify;
margin-top:0;
}


/* CSS */
.btn-circle {
width: 100px;
    height: 51px;
    border-radius: 7px;
    text-align: center;
    padding-left: 0;
    padding-right: 0;
    font-size: 16px;
    white-space: normal;
}


  </style>
 </head>
 <body>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
 <div id="svg_wrap"></div>

 <h1>Онлайн сдача устава</h1>
<section>
	<center><h3>Ваши данные</h3></center><br>
                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'familia')->textInput(['placeholder' => 'Фамилия', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'otchestvo')->textInput(['placeholder' => 'Отчество', 'value'=>''])->label(false) ?>
                <?= $form->field($model, 'telefon')->textInput(['placeholder' => '89', 'value'=>''])->label(false) ?>
              <?= $form->field($model, 'data')->textInput(['placeholder' => 'Дата рождения', 'value'=>''])->label(false)?>
                <?= $form->field($model, 'city')->textInput(['placeholder' => 'Город', 'value'=>''])->label(false)?>
<?= $form->field($model, 'stabs')
        ->dropDownList(
            ['1' => 'Штаб «Механ»',
                '2' => 'Штаб «УдГУ»',
                '3' => 'Штаб ГГПИ',
                '4' =>'Штаб «Эгида»',
                '5' =>'Без Штаба'],
            [
                'id' => 'stabs',
                'prompt' => '--выберите--',
            ]
        )->label('Штаб') ?>
        <?= $form->field($model, 'id_user')
        ->dropDownList(
            ['7' => 'СПО «Детки»',
                '8' => 'СПО «Дзержинец»',
                '9' => 'СПО «Драйв»',
                '10' =>'СПО «Друзья»',
                '11' => 'СПО «Лето»',
                '12' => 'СПО «Данко»',
                '14' => 'СПО «АВД»',
                '15' => 'СПО «Victory»',
                '16' => 'СПО «Сказка»',
                '17' => 'СПО «Феникс»',
                '18' => 'СПО «Лечо»',
                '19' => 'СПО «Апельсин»',
                '20' => 'СПО «Парус»',
                '21' => 'СПО «Вита»',
                '22' => 'СПО «Южный Ветер»',
                '23' => 'СОП «Sun»',
                '24' => 'СОП «Авангард»',
                '25' => 'СОП «Арбат»',
                '26' => 'СОП «Вектор»',
                '27' => 'СОП «Ромат»',
                '28' => 'СОП «KetGood»',
                '29' => 'СОП «Титан»',
                '30' => 'СОП «Армада»',
                '31' => 'СОП «Пегас»',
                '32' => 'СОП «Эдельвейс»',
                '33' => 'СОП «Ланселот»',
                '34' => 'СОП «Нон-Стоп»',
                '35' => 'СОП «Проф.com»',
                '36' => 'СОП «Невада»',
                '37' => 'СОП «Италмас»',
                '38' => 'СОП «Орион»',
                '39' => 'СОП «Рассвет»',
                '40' => 'СПО «Элемент»',
                '41' => 'СCО «Д.Э.М.С.»',
                '42' => 'ССО «Монолит»',
                '43' => 'ССО «Вихрь»',
                '44' => 'ССО «Высота»',
                '45' => 'ССО «Грация»',
                '46' => 'ССО «Ритм»',
                '47' => 'СВО «Спасатели»',
                '48' => 'ССервО «Кристалл»',
                '49' => 'СМО «Эндорфин»',
                '50' => 'СПО «Нова»',
                '52' => 'ССО «Колосс»',
                '53' => 'ССО «Стронг»',
                '54' => 'СПО «Infinity»',
                '55' => 'СПО «Свет»',
                ],
            [
                'id' => 'id_user',
                'prompt' => '--выберите--',
            ]
        )->label('Отряд') ?>
</section>

<section>
  <center><h3>ВОПРОСЫ ПО УСТАВУ №1</h3></center><br>
  <?= $form->field($modelQuestion, "question")->textInput(['placeholder' => '', 'value'=>'']) ?>
   <?= $form->field($modelQuestion, "question_1")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_2")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_3")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_4")->textInput(['placeholder' => '', 'value'=>'']) ?>
</section>

<section>
  <center><h3>ВОПРОСЫ ПО УСТАВУ №2</h3></center><br>
  <?= $form->field($modelQuestion, "question_5")->textInput(['placeholder' => '', 'value'=>'']) ?>
   <?= $form->field($modelQuestion, "question_6")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_7")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_8")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_9")->textInput(['placeholder' => '', 'value'=>'']) ?>
</section>

<section>
  <center><h3>КОДЕКС ЧЕСТИ</h3></center><br>
  <?= $form->field($modelQuestion, "question_10")->textInput(['placeholder' => '', 'value'=>'']) ?>
   <?= $form->field($modelQuestion, "question_11")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_12")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_13")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_14")->textInput(['placeholder' => '', 'value'=>'']) ?>
<?= $form->field($modelQuestion, "question_15")->textInput(['placeholder' => '', 'value'=>'']) ?>
</section>

<section>
<center><h3>СОГЛАСИЕ НА ОБРАБОТКУ ПЕРСОНАЛЬНЫХ ДАННЫХ</h3></center>

<p>1. <strong>Общие положения</strong></p>

<p>1.1 УРО МООО РСО (далее по тексту &ndash; Оператор) ставит соблюдение прав и свобод граждан одним из важнейших условий осуществления своей деятельности.<br />
1.2 Политика Оператора в отношении обработки персональных данных (далее по тексту &mdash; Политика) применяется ко всей информации, которую Оператор может получить о посетителях веб-сайта lk.udrso.ru.<br />
Персональные данные обрабатывается в соответствии с ФЗ &laquo;О персональных данных&raquo; № 152-ФЗ.<br />
<br />
2. <strong>Основные понятия, используемые в Политике: </strong><br />
2.1 Веб-сайт - совокупность графических и информационных материалов, а также программ для ЭВМ и баз данных, обеспечивающих их доступность в сети интернет по сетевому адресу lk.udrso.ru;<br />
2.2 Пользователь &ndash; любой посетитель веб-сайта lk.udrso.ru;<br />
2.3 Персональные данные &ndash; любая информация, относящаяся к Пользователю веб-сайта lk.udrso.ru;<br />
2.4 Обработка персональных данных - любое действие с персональными данными, совершаемые с использованием ЭВМ, равно как и без их использования;<br />
2.5 Обезличивание персональных данных &ndash; действия, результатом которых является невозможность без использования дополнительной информации определить принадлежность персональных данных конкретному Пользователю или лицу;<br />
2.6 Распространение персональных данных &ndash; любые действия, результатом которых является раскрытие персональных данных неопределенному кругу лиц;<br />
2.7 Предоставление персональных данных &ndash; любые действия, результатом которых является раскрытие персональных данных определенному кругу лиц;<br />
2.8 Уничтожение персональных данных &ndash; любые действия, результатом которых является безвозвратное уничтожение персональных на ЭВМ или любых других носителях.<br />
<br />
<strong>3. Оператор может обрабатывать следующие персональные данные Пользователя: </strong><br />
3.1 Список персональных данных, которые обрабатывает оператор: фамилия, имя, отчество, номер телефона, адрес электронной почты, почтовый адрес, паспортные данные, СНИЛС, ИНН, место учебы.<br />
3.2. Кроме того, на сайте происходит сбор и обработка обезличенных данных о посетителях (в т.ч. файлов &laquo;cookie&raquo;) с помощью сервисов интернет-статистики (Яндекс Метрика, Гугл Аналитика и других).<br />
<br />
<strong>4. Цели обработки персональных данных</strong><br />
4.1 Персональные данные пользователя - фамилия, имя, отчество, номер телефона, адрес электронной почты, почтовый адрес, паспортные данные, СНИЛС, ИНН, место учебы - обрабатываются со следующей целью: <strong>Трудоустройство на работу. </strong>Оператор имеет право направлять Пользователю уведомления о новых продуктах и услугах, специальных предложениях и различных событиях.&nbsp;<br />
Пользователь всегда может отказаться от получения информационных сообщений, направив Оператору письмо на адрес udrso@mail.ru<br />
4.2 Обезличенные данные Пользователей, собираемые с помощью сервисов интернет-статистики, служат для сбора информации о действиях Пользователей на сайте, улучшения качества сайта и его содержания.<br />
<br />
<strong>5. Правовые основания обработки персональных данных </strong><br />
5.1 Оператор обрабатывает персональные данные Пользователя только в случае их отправки Пользователем через формы, расположенные на веб-сайте lk.udrso.ru. Отправляя свои персональные данные Оператору, Пользователь выражает свое согласие с данной Политикой.<br />
5.2 Оператор обрабатывает обезличенные данные о Пользователе в случае, если Пользователь разрешил это в настройках браузера (включено сохранение файлов &laquo;cookie&raquo; и использование технологии JavaScript).<br />
<br />
<strong>6. Порядок сбора, хранения, передачи и других видов обработки персональных данных </strong><br />
6.1 Оператор обеспечивает сохранность персональных данных и принимает все возможные меры, исключающие доступ к персональным данным неуполномоченных лиц.<br />
6.2 Персональные данные Пользователя никогда, ни при каких условиях не будут переданы третьим лицам, за исключением случаев, связанных с исполнением действующего законодательства.<br />
6.3. В случае выявления неточностей в персональных данных, Пользователь может актуализировать их, направив Оператору уведомление с помощью электронной почты на электронный адрес Оператора udrso@mail.ru, либо на почтовый адрес Оператора 426034, г. Ижевск, ул. Лихвинцева, 68, с пометкой &laquo;Актуализация персональных данных&raquo;.<br />
6.3 Срок обработки персональных данных является неограниченным. Пользователь может в любой момент отозвать свое согласие на обработку персональных данных, направив Оператору уведомление с помощью электронной почты на электронный адрес Оператора udrso@mail.ru, либо на почтовый адрес Оператора 426034, г. Ижевск, ул. Лихвинцева, 68, с пометкой &laquo;Отзыв согласия на обработку персональных данных&raquo;.<br />
<br />
<strong>7. Заключительные положения </strong><br />
7.1. Пользователь может получить любые разъяснения по интересующим вопросам, касающимся обработки его персональных данных, обратившись к Оператору с помощью электронной почты udrso@mail.ru, либо на почтовый адрес Оператора 426034, г. Ижевск, ул. Лихвинцева, 68.<br />
7.2. В данном документе будут отражены любые изменения политики обработки персональных данных Оператором. В случае существенных изменений Пользователю может быть выслана информация на указанный им электронный адрес.</p>
<br>
<p>Нажимая на кнопку ГОТОВО вы автоматически соглашаетесь со всеми перечисленным</p>

</section>
  <div class="button" id="prev">&larr; Назад</div>
<div class="button" id="next">Далее &rarr;</div>
<?= Html::submitButton('Готово', ['class' => 'btn btn-success  btn-circle' , 'id' => 'submit']) ?>
   <?php ActiveForm::end(); ?>
 </body>
</html>

<script>
$( document ).ready(function() {
var base_color = "rgb(230,230,230)";
var active_color = "rgb(237, 40, 70)";



var child = 1;
var length = $("section").length - 1;
$("#prev").addClass("disabled");
$("#submit").addClass("disabled");

$("section").not("section:nth-of-type(1)").hide();
$("section").not("section:nth-of-type(1)").css('transform','translateX(100px)');

var svgWidth = length * 200 + 24;
$("#svg_wrap").html(
  '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
    svgWidth +
    ' 24" xml:space="preserve"></svg>'
);

function makeSVG(tag, attrs) {
  var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
  for (var k in attrs) el.setAttribute(k, attrs[k]);
  return el;
}

for (i = 0; i < length; i++) {
  var positionX = 12 + i * 200;
  var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
  document.getElementById("svg_form_time").appendChild(rect);
  // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
  var circle = makeSVG("circle", {
    cx: positionX,
    cy: 12,
    r: 12,
    width: positionX,
    height: 6
  });
  document.getElementById("svg_form_time").appendChild(circle);
}

var circle = makeSVG("circle", {
  cx: positionX + 200,
  cy: 12,
  r: 12,
  width: positionX,
  height: 6
});
document.getElementById("svg_form_time").appendChild(circle);

$('#svg_form_time rect').css('fill',base_color);
$('#svg_form_time circle').css('fill',base_color);
$("circle:nth-of-type(1)").css("fill", active_color);


$(".button").click(function () {
  $("#svg_form_time rect").css("fill", active_color);
  $("#svg_form_time circle").css("fill", active_color);
  var id = $(this).attr("id");
  if (id == "next") {
    $("#prev").removeClass("disabled");
    if (child >= length) {
      $(this).addClass("disabled");
      $('#submit').removeClass("disabled");
    }
    if (child <= length) {
      child++;
    }
  } else if (id == "prev") {
    $("#next").removeClass("disabled");
    $('#submit').addClass("disabled");
    if (child <= 2) {
      $(this).addClass("disabled");
    }
    if (child > 1) {
      child--;
    }
  }
  var circle_child = child + 1;
  $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
    "fill",
    base_color
  );
  $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
    "fill",
    base_color
  );
  var currentSection = $("section:nth-of-type(" + child + ")");
  currentSection.fadeIn();
  currentSection.css('transform','translateX(0)');
 currentSection.prevAll('section').css('transform','translateX(-100px)');
  currentSection.nextAll('section').css('transform','translateX(100px)');
  $('section').not(currentSection).hide();
});

});

</script>
