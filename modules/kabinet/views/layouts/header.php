<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" integrity="sha512-pli9aKq758PMdsqjNA+Au4CJ7ZatLCCXinnlSfv023z4xmzl8s+Jbj2qNR7RI8DsxFp5e8OvbYGDACzKntZE9w==" crossorigin="anonymous" />
<script src="/admin/web/js/dialog.js"></script>
<header class="main-header">

<?= Html::a('<span class="logo-mini">ЛК</span><span class="logo-lg">' . 'Личный Кабинет' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

        <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Главная <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Список отряда</a></li>
          </ul>
        </div>





                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/uploads/avatars/<?= Yii::$app->user->identity->avatar ?>" height="50" width="50" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">Привет, <?= Yii::$app->user->identity->name ?>!</span>
                    </a>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="/login/logout" data-method="post" data-method="post data-toggle="control-sidebar"></i>ВЫХОД</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
