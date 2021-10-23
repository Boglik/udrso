<?php

use app\components\contact;

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
/* @var $this yii\web\View */
/* @var $model app\models\Zayavki_na_otryad */

/* @var $form yii\widgets\ActiveForm */
?>

<?php include 'header.php'; ?>
    <main id="main">

        <!-- ======= Features Section ======= -->
        <section class="features">
            <div class="container">
                <section class="facts section-bg" data-aos="fade-up">
                    <div class="container">
                        <div class="section-title">
                            <h2>Чтобы закончить регистрацию, заполните поля ниже</h2>
                        </div>
                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                        <section><?= $form->field($model, "question")->textInput(['placeholder' => 'Название вашего отряда?', 'value'=>''])->label(false) ?>
                            <center><h3>ВОПРОСЫ ПО УСТАВУ №1</h3></center><br>
                             <?= $form->field($model, "question_1")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_2")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_3")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_4")->textInput(['placeholder' => '', 'value'=>'']) ?>
                        </section>

                        <section>
                            <center><h3>ВОПРОСЫ ПО УСТАВУ №2</h3></center><br>
                            <?= $form->field($model, "question_5")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_6")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_7")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_8")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_9")->textInput(['placeholder' => '', 'value'=>'']) ?>
                        </section>

                        <section>
                            <center><h3>КОДЕКС ЧЕСТИ</h3></center><br>
                            <?= $form->field($model, "question_10")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_11")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_12")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_13")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_14")->textInput(['placeholder' => '', 'value'=>'']) ?>
                            <?= $form->field($model, "question_15")->textInput(['placeholder' => '', 'value'=>'']) ?>
                        </section>
                        <?= Html::submitButton('Готово', ['class' => 'btn btn-success  btn-circle' , 'id' => 'submit']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>

                </section><!-- КОНЕЦ ФАКТАМ -->
                <br>
                <div class="section-title">
                    <h2>НАШИ ОБЪЕДИНЕНИЯ</h2>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="/images/SOF2.png" class="img-souz" alt="">
                    </div>
                    <div class="col-md-7 pt-4">
                        <h3>Союз Отрядных Гитаристов</h3>
                        <p class="font-italic">
                            <strong>Союз Отрядых Фотографов (СОФ)</strong> — организация, обеспечивающая информационную поддержку, а именно — фото и видеосъемку мероприятий УРО МООО «РСО». Союз отрядных фотографов был основан 23 октября 2012 года на Фестивале студенческих отрядов Удмуртии.
                        </p>
                        <ul>
                            <br>
                            <li> Если у тебя есть фотоаппарат и ты не можешь без него жить, хочешь быть в центре всех отрядных мероприятий и готов развиваться вместе с нами, значит нам нужен именно ты!
                            </li>
                            <div class="connect"><a href="https://vk.com/sof_udm" target="_blank"><div class="connect_knopka">Присоединиться</div></a></div>

                        </ul>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="/images/SOG3.png" class="img-souz" alt="">
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1">
                        <h3>Союз Отрядных Фотографов</h3>
                        <p class="font-italic">
                            <strong>Союз Отрядных Гитаристов (СОГ)</strong> — это то место, где каждый человек, который знает и любит отрядные песни, может найти своих единомышленников.
                            Официальной датой создания принято считать 17 октября 2017 года.<br>
                        </p>
                        <br>
                        <p>
                            Нам ещё мало лет, но за эти годы у нас появились значки, были написаны песни,
                            проведено огромное количество спевок и сформировались традиции.
                            У нас всё ещё впереди, если ты хочешь стать частью нашей истории, стать одним из нас,
                            то бери гитару в руки и Добро пожаловать!
                        </p><br>
                        <div class="connect"><a href="https://vk.com/sof_udm" target="_blank"><div class="connect_knopka">Присоединиться</div></a></div>

                    </div>
                </div>
            </div>
        </section><!-- End Features Section -->

    </main><!-- End #main -->

<?php include 'footer.php'; ?>