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
                        <h2>Чтобы продолжить регистрацию, заполните поля ниже</h2>
                    </div>



                    <?php $form = ActiveForm::begin([]); ?>
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'familia')->textInput(['placeholder' => 'Фамилия', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'otchestvo')->textInput(['placeholder' => 'Отчество', 'value' => ''])->label(false) ?>
                    <?=
                            $form->field($model, 'pol')
                            ->dropDownList(
                                    ['Мужской' => 'Мужской',
                                        'Женский' => 'Женский',
                                    ],
                                    [
                                        'prompt' => '--выберите пол--',
                                    ]
                            )->label('Пол')->label(false)
                    ?>
                    <?= $form->field($model, 'data_rozhdenia')->textInput(['placeholder' => 'ДД.ММ.ГОД.', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'telefon')->textInput(['placeholder' => 'Номер телефона', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'seria_passporta')->textInput(['placeholder' => 'Серия паспорта', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'nomer_passporta')->textInput(['placeholder' => 'Номер паспорта', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'mesto_rozdenia')->textInput(['placeholder' => 'Место паспорта', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'kem_vidan_passport')->textInput(['placeholder' => 'Кем выдан паспорт', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'data_vidacha_passporta')->textInput(['placeholder' => 'Дата выдачи паспорт', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'kod_podrazdelenia')->textInput(['placeholder' => 'Код подразделения', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'index_zitelstva')->textInput(['placeholder' => 'Индекс жительства', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'adress_postoyannogo_prozivania')->textInput(['placeholder' => 'Адрес постоянной регистрации', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'fact_mesto_zitelstva')->textInput(['placeholder' => 'Фактическое место жительства', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'snils')->textInput(['placeholder' => 'СНИЛС', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'inn')->textInput(['placeholder' => 'ИНН', 'value' => ''])->label(false) ?>
                    <?=
                            $form->field($model, 'stabs')
                            ->dropDownList(
                                    ['1' => 'Штаб «Механ»',
                                        '2' => 'Штаб УдГУ',
                                        '3' => 'Штаб ГГПИ',
                                        '4' => 'Штаб ЭГИДА',
                                    ],
                                    [
                                        'prompt' => '--выберите штаб--',
                                    ]
                            )->label('stud_napravlenie')->label(false)
                    ?>
                    <?=
                            $form->field($model, 'stud_napravlenie')
                            ->dropDownList(
                                    ['cтуденческие педагогические отряды' => 'СПО',
                                        'cтуденческие отряды проводников' => 'СОП',
                                        'cтуденческие строительные отряды' => 'ССО',
                                        'cтуденческие медицинские отряды' => 'СМО',
                                        'cтуденческие ветеринарные отряды' => 'СВО',
                                        'cтуденческие сервисные отряды' => 'СервСО',
                                    ],
                                    [
                                        'id' => 'pol',
                                        'prompt' => '--выберите направление к которому принадлежит ваш отряд--',
                                        '0.345' => ['selected ' => true], // у буржуев взял - не работает
                                    ]
                            )->label('stud_napravlenie')->label(false)
                    ?>
                    <?=
                            $form->field($model, 'id_user')
                            ->dropDownList(
                                    ['7' => '«Детки»',
                                        '8' => '«Дзержинец»',
                                        '9' => '«Драйв»',
                                        '10' => '«Друзья»',
                                        '11' => '«Лето»',
                                        '12' => '«Данко»',
                                        '14' => '«АВД»',
                                        '15' => '«Victory»',
                                        '16' => '«Сказка»',
                                        '17' => '«Феникс»',
                                        '18' => '«Лечо»',
                                        '19' => '«Апельсин»',
                                        '20' => '«Парус»',
                                        '21' => '«Вита»',
                                        '22' => '«Южный Ветер»',
                                        '23' => '«Sun»',
                                        '24' => '«Авангард»',
                                        '25' => '«Арбат»',
                                        '26' => '«Вектор»',
                                        '27' => '«Ромат»',
                                        '28' => '«KetGood»',
                                        '29' => '«Титан»',
                                        '30' => '«Армада»',
                                        '31' => '«Пегас»',
                                        '32' => '«Эдельвейс»',
                                        '33' => '«Ланселот»',
                                        '34' => '«Нон-Стоп»',
                                        '35' => '«Проф.com»',
                                        '36' => '«Невада»',
                                        '37' => '«Италмас»',
                                        '38' => '«Орион»',
                                        '39' => '«Рассвет»',
                                        '40' => '«Элемент»',
                                        '41' => '«Д.Э.М.С.»',
                                        '42' => '«Монолит»',
                                        '43' => '«Вихрь»',
                                        '44' => '«Высота»',
                                        '45' => '«Грация»',
                                        '46' => '«Ритм»',
                                        '47' => '«Спасатели»',
                                        '48' => '«Кристалл»',
                                        '49' => '«Эндорфин»',
                                        '50' => '«Нова»',
                                        '52' => '«Колосс»',
                                        '53' => '«Стронг»',
                                        '54' => '«Infinity»',
                                        '55' => '«Свет»',
                                    ],
                                    [
                                        'id' => 'otryad',
                                        'prompt' => '--выберите отряд--',
                                    ]
                            )->label('Отряд')->label(false)
                    ?>
                    <?= $form->field($model, 'mesto_uchebi')->textInput(['placeholder' => 'Место учебы', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'fakultet')->textInput(['placeholder' => 'Факультет', 'value' => ''])->label(false) ?>
                    <?= $form->field($model, 'nomer_klass')->textInput(['placeholder' => 'Номер группы или класса(если школа)', 'value' => ''])->label(false) ?>

                    <?=
                            $form->field($model, 'forma_obuchenia')
                            ->dropDownList(
                                    ['Бюджет' => 'Бюджет', 'Платное обучение' => 'Платное обучение'],
                                    [
                                        'prompt' => '--Выберите тип обучения--',
                                    ]
                            )->label('Форма обучения')->label(false)
                    ?>
                    <?=
                            $form->field($model, 'tip_uchebi')
                            ->dropDownList(
                                    ['Очная' => 'Очная', 'Очно-заочная' => 'Очно-заочная', 'Заочная' => 'Заочная'],
                                    [
                                        'prompt' => '--выберите форму обучения--',
                                    ]
                            )->label('Тип учебы')->label(false)
                    ?>
                    <?= $form->field($model, 'mesto_raboti')->textInput(['placeholder' => 'Место работы', 'value' => ''])->label(false) ?>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>



                </div>

            </section><!-- КОНЕЦ ФАКТАМ -->
        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->

<?php include 'footer.php'; ?>