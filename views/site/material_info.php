<?php

use app\components\contact;

use yii\helpers\Html;
/* @var $this yii\web\View */


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
<main id="main">

    <!-- ======= Features Section ======= -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2><?= $model->title ?></h2>
            </div>

            <?= $model->text ?>
        </div>

    </section><!-- End Features Section -->

</main><!-- End #main -->

<?php include 'footer.php'; ?>
<!--footer-->

