<?php

use app\components\contact;

use kartik\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
/* @var $this yii\web\View */
/* @var $model app\models\Zayavki_na_otryad */

/* @var $form yii\widgets\ActiveForm */
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta property="og:title" content="Студенческие отряды Удмуртской Республики"/>
    <meta property="og:description" content="Сайт студенческих отрядов Удмуртской Республики - региональное отделение РСО"/>
    <meta property="og:image" content="https://udrso.ru/img/logo_ogg.jpg"/>
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:type:website" />
    <meta property="og:url" content= "https://udrso.ru/" />
    <meta content="РСО, УРО МООО РСО, Студенческие отряды, педагогические отряды, строительные отряды, отряды проводников" name="keywords">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="УРО МООО РСО - Студенческие Отряды Удмуртской Республики" name="description">
    <meta content="РСО, УРО МООО РСО, Студенческие отряды, педагогические отряды, строительные отряды, отряды проводников" name="keywords">
    <link href="/web/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/assets/vendor/owl.carousel//assets/owl.carousel.min.css" rel="stylesheet">
    <!--    <link href="/assets/vendor/aos/aos.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/pgwslider.min.css">
    <link rel="stylesheet" href="/assets/css/demo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="assets/js/pgwslider.min.js"></script>
    <!-- =======================================================
    * Alexander Bogomolov г. Ижевск. СПО "ДРАЙВ".
    ======================================================== -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function ()
  { 
  $('#nav li').hover(
  function () {
    $('ul', this).slideDown(100);
  }, 
  function () {
    $('ul', this).slideUp(100);         
  }
  );    
});
</script>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
    <div class="logo float-left">
        <!--            <h1 class="text-light"><a href="index.html"><span>Moderna</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="/"><img src="/assets/img/logo.jpg" alt="" class="img-fluid"></a>
    </div>




    <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
            <?php


            if (Yii::$app->user->can('admin')) {
                echo '<li><a href="/admin/">Админ-панель</a></li>';
            }
            if (Yii::$app->user->can('mehan')) {
                echo '<li><a href="/admin/mehan">Админ-панель</a></li>';
            }
            if (Yii::$app->user->can('udgu')) {
                echo '<li><a href="/admin/udgu">Админ-панель</a></li>';
            }
            if (Yii::$app->user->can('ggpi')) {
                echo '<li><a href="/admin/ggpi">Админ-панель</a></li>';
            }
            if (Yii::$app->user->can('egida')) {
                echo '<li><a href="/admin/egida">Админ-панель</a></li>';
            }
            if (Yii::$app->user->can('regstab')) {
                echo '<li><a href="/admin/squad">Админ-панель</a></li>';
            }
            if (Yii::$app->user->can('user')) {
                echo '<li><a href="/kabinet/news">Личный кабинет</a></li>';
            }

            ?>
            <li><a href="/">Главная</a></li>
            <li class="drop-down"><a href="">О нас</a>
                <ul>
                    <li><a href="/letopis">История</a></li>
                    <li class="drop-down"><a href="#">Структура</a>

                        <ul>
                            <li><a href="/shtaby-vuzov">Штабы вузов</a></li>
                            <li><a href="/pravlenie">Правление регионального отделения</a></li>
                            <li><a href="/pravlenie/regionalnyj-shtab">Региональный штаб</a></li>
                        </ul>
                    </li>
                    <li><a href="/ksiv-otryad">КСИВ</a></li>
                </ul>
            </li>
            <li><a href="/documents">Документы</a></li>
            <li class="drop-down"><a href="">Отряды</a>
                <ul>
                    <li><a href="/spo-otryady">СПО</a></li>
                    <li><a href="/sop-otryady">СОП</a></li>
                    <li><a href="/sso-otryady">ССО</a></li>
                    <li><a href="/svo-otryady">СВО</a></li>
                    <li><a href="/sservo-otryady">СервСО</a></li>
                    <li><a href="/smo-otryady">СМО</a></li>


                </ul>
            </li>
            <li><a href="/plan-meropriyatij">План мероприятий</a></li>
            <li><a href="/koster">Костер+</a></li>
            <li><a href="/blog">Архив</a></li>
            <?php
            echo Nav::widget([
                'items' => [
                    [
                        'label' => 'Войти',
                        'url' => ['/login'],
                        'visible' => Yii::$app->user->isGuest
                    ],
                    [
                        'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/logout'],
                        'visible' => !(Yii::$app->user->isGuest)
                    ],
                ],
                'options' => ['class' =>'nav-pills'], // set this to nav-tabs to get tab-styled navigation
            ]);
            ?>
        </ul>
    </nav><!-- .nav-menu -->


</header>
<meta property="og:title" content="Студенческие отряды Удмуртской Республики"/>
<meta property="og:description" content="Сайт студенческих отрядов Удмуртской Республики - Региональное отделение"/>
<meta property="og:image" content="https://udrso.ru/assets/img/logo.jpg"/>
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="300" />
<meta property="og:url" content= "https://udrso.ru/" />
<link href="favicon1.ico" rel="shortcut icon" type="image/x-icon" />
<!-- начало видео блока -->
    <div class="fullscreen-bg">
        <div class="overlay">
        </div>
        <video loop="" muted="" autoplay="" poster="/assets/video/kadr.png" class="fullscreen-bg__video">
            <source src="/assets/video/video.mp4" type="video/mp4">
        </video>
    </div>
    <!-- конец видео блока -->
<br>
<!-- ======= СЛАЙДШОУ ======= -->
    <section class="services" data-aos="fade-up" >
        <div class="container">

            <!--gallery-->
<!-- <?php include('slideshow.php'); ?>
<!-- gallery-->

            </div>
        </div>
    </section><!--КОНЕЦ СЛАЙДШОУ -->
    <!-- ======= ФОТОГРАФИЯ ШАПКИ ОТРЯДА ======= -->
    <section id="about">
    <div class="container">
        <div class="text-intro">
            <div class="section-title">
                <h2>ОЙ! НИЧЕГО НЕ НАЙДЕНО!</h2>
            </div>
            <p class="font-italic">
            <p style="text-align: center;">Если вы оказались здесь, значит, страницы не существует </em><br />
                <em>Возможно, вы ошиблись адресом</em><br />
                <em>или статья была удалена/перемещена</em><br />
                <em>Попробуйте еще раз. Если вы её не найдете, напишите нам</em></p>
            </p>
        </div>
    </div>
</section>


<!-- ======= Footer ======= -->
<footer id="footer" data-aos="fade-up">

<!--    <div class="footer-newsletter">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-6">-->
<!--                    <h4>Our Newsletter</h4>-->
<!--                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>-->
<!--                </div>-->
<!--                <div class="col-lg-6">-->
<!--                    <form action="" method="post">-->
<!--                        <input type="email" name="email"><input type="submit" value="Subscribe">-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Категории</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/">Главная</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/documents">Документы</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/plan-meropriyatij">План мероприятий</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/koster+">Костер+</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/privacy">Политика кондефициальности</a></li>
                    </ul>
                </div>

<!--                 <div class="col-lg-3 col-md-6 footer-links">
    <h4>Сервисы</h4>
    <ul>
        <li><i class="bx bx-chevron-right"></i> <a href="#">Сайт ТрудКрут</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#">Министерство по делам Молодежи УР</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#">Министертво Образования УР</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#">РСМ</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#">Салон "Жаркий Вован"</a></li>
    </ul>
</div> -->

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Контакты</h4>
                    <p>
                        ул. Лихвинцева, 68 <br>
                        г. Ижевск<br>
                        Удмуртская Республика <br><br>
                        <strong>Телефон:</strong> 8-912-444-33-66<br>
                        <strong>Email:</strong> info@udrso.ru<br>
                    </p>

                </div>
<div class="col-lg-3">
                    <h4>Партнеры</h4>
                    <p>
                        <a href="http://трудкрут.рф" style="color:white";>трудкрут.рф</a><br>
                    </p>

                </div>
                <div class="col-lg-3 col-md-6 footer-info">
                    <h3>Режим работы</h3>
                    <p>пн — чт с 09:00 — 18:00. </p>
                    <p> пт с 09:00 — 17:00</p>
                    <p>обед с 13:00-14:00</p>  
                    <br>
                    <div class="social-links mt-3">
                        <a href="http://vk.com/udrso" class="twitter"><i class="bx bxl-vk"></i></a>
                        <a href="https://www.instagram.com/udrso/" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="https://www.facebook.com/stroyotrydUR" class="facebook"><i class="bx bxl-facebook"></i></a>
                    </div>
                </div>
                            </div>
        </div>
    </div>
    
<div class="container">
    <div class="copyright">
        &copy; <strong><span>Студенческие отряды Удмуртской Республики</span></strong> <br> 1964 - <?php echo date('Y'); ?>

    </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
<script src="/assets/vendor/venobox/venobox.min.js"></script>
<script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="/assets/vendor/counterup/counterup.min.js"></script>
<script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

</body>

</html>
<!--<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>-->
<!--<div id="hidden_mobile">-->
<!--<div id="vk_community_messages"></div>-->
<!--<script type="text/javascript">-->
<!--VK.Widgets.CommunityMessages("vk_community_messages", 367132, {widgetPosition: "left",tooltipButtonText: "Есть вопрос?"});-->
<!--</script>-->
<!--</div>-->
