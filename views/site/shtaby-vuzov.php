<?php

use site\components\contact;

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model site\models\Zayavki_na_otryad */

/* @var $form yii\widgets\ActiveForm */
?>

<?php include 'header.php'; ?>


    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">

                    <h2>Штабы вузов</h2>

                    <ol>
                       <li><a href="/"> <p style="color:white;">Главная</p></a></li>
                        <li>Штабы вузов</li>
                    </ol>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Об истории ======= -->
        <section class="about" data-aos="fade-up">
            <div class="container">
                <div class="section-title">
                    <h2>ШТАБЫ ВЫСШИХ УЧЕБНЫХ ЗАВЕДЕНИЙ</h2>
                </div>


                        Движение студенческих отрядов на территории Удмуртской Республики активно поддерживается администрацией высших учебных заведений.<p style="margin: 0;"></p>
                        В университетах республики создаются штабы, координирующие деятельность отрядов вуза и обеспечивающие взаимодействие с администрацией университетов.<p style="margin: 0;"></p>
                        На сегодняшний день на территории республики действую 4 штаба студенческих отрядов:<p style="margin: 0;"></p><br>

                        <i>— Штаб студенческих отрядов Ижевского государственного технического университета имени М.Т. Калашникова «Механ»</i><p style="margin: 0;"></p>
                            <i>— Штаб студенческих отрядов Удмуртского государственного университета</i><p style="margin: 0;"></p>
                                <i>— Штаб студенческих отрядов Глазовского государственного педагогического института</i><p style="margin: 0;"></p>
                                    <i>— Штаб студенческих отрядов Ижевской государственной медицинской академии «Эгида»</i><p style="margin: 0;"></p><br>

                        В 2019 году штаб студенческих отрядов ИжГТУ им. М.Т. Калашникова «Механ» стал лучшим штабом студенческих отрядов образовательных организаций высшего образования в России.<p style="margin: 0;"></p>

            </div>
        </section><!-- конец истории -->
        <!-- ======= Services Section ======= -->
        <section class="services">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box icon-box-pink">
                            <img src="assets/img/mehan.png" width="200" height="200" alt="mehan"></a>
                            <h4 class="title">Штаб «Механ»</h4>
                            <p class="description">Штаб студенческих отрядов Ижевского государственного технического университета</p>
                            <div class="button_stab_mehan"><a href="/shtaby/stab-mehan" target="_blank"><div class="button_stabi_knopka">Перейти</div></a></div>

                        </div>

                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box icon-box-cyan">
                           <img src="assets/img/udgu.png" width="200" height="200" alt="udgu"></a>
                            <h4 class="title">Штаб УдГУ</h4>
                            <p class="description">Штаб студенческих отрядов Удмуртского государственного университета</p>
                            <div class="button_stab_udgu"><a href="/shtaby/stab-udgu" target="_blank"><div class="button_stabi_knopka">Перейти</div></a></div>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box icon-box-green">
                            <img src="assets/img/ggpi.jpg" width="200" height="200" alt="ggpi"></a>
                            <h4 class="title">Штаб ГГПИ</h4>
                            <p class="description">Штаб студенческих отрядов Глазовского государственного педагогического института</p>
                            <div class="button_stab_ggpi"><a href="/shtaby/shtaby-shso-ggpi" target="_blank"><div class="button_stabi_knopka">Перейти</div></a></div>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                        <div class="icon-box icon-box-blue">
                            <div class="egida"><img src="assets/img/egida.png" width="240" height="200" alt="egida"></a></div>
                            <h4 class="title">Штаб «Эгида»</h4>
                            <p class="description">Штаб студенческих отрядов Ижевской государственной медицинской академии</p>
                            <div class="button_stab_egida"><a href="/shtaby/shtab-egida" target="_blank"><div class="button_stabi_knopka">Перейти</div></a></div>

                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->
    </main>

<?php include 'footer.php'; ?>