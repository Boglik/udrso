<?php
use kartik\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;


?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="УРО МООО РСО - Студенческие Отряды Удмуртской Республики" name="description">
    <meta property="og:title" content="Студенческие отряды Удмуртской Республики"/>
    <meta property="og:description" content="Сайт студенческих отрядов Удмуртской Республики - региональное отделение РСО"/>
    <meta property="og:image" content="https://udrso.ru/image/logo_ogg.jpg"/>
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:type:website" />
    <meta property="og:url" content= "https://udrso.ru/" />
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
        <a href="/"><img src="/assets/images/logo.jpg" alt="" class="img-fluid"></a>
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
                echo '<li><a href="/admin/">Админ-панель</a></li>';
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


</header><!-- End Header -->