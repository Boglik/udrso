<htm>
    <head>
          <style>
   a:link {
    color: #000000; /* Цвет ссылок */
   }
   a:visited {
    color: #900060; /* Цвет посещенных ссылок */
   }
   a:active {
    color: #f00; /* Цвет активной ссылки */ 
   } 
  </style>
    </head>
</htm>
<?php

use app\components\contact;

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Zayavki_na_otryad */

/* @var $form yii\widgets\ActiveForm */
?>

<?php include 'header.php'; ?>
<!-- ======= ФОТОГРАФИЯ ШАПКИ ОТРЯДА ======= -->
<br>
<!-- конец видео блока -->
<!-- ======= СЛАЙДШОУ ======= -->
    <section class="services" data-aos="fade-up" >
        <div class="container">

            </div>

        </div>
    </section><!--КОНЕЦ СЛАЙДШОУ -->

<main role="main" class="container">

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="section-title">
            <h6>СОДЕРЖАНИЕ:</h6>
        </div>
        <?php foreach ($material as $item): ?>
        <div class="media text-muted pt-3">

            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark"><a href="/documents/<?= $item->alias ?>"><?= $item->title ?></a></strong>
            </p>
        </div></a>
        <?php endforeach ?>
    </div>
</main>

<?php include 'footer.php'; ?>
<!--footer-->

