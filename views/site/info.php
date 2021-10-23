<?php include 'header.php'; ?>
<?php
use yii\helpers\Html; // разрешить использовать объект Html
$this->title = $otryad->name . ' - Студенческие Отряды Удмуртской Республики';
?>
<title><?= Html::encode($this->title) ?></title>


<main id="main">
    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Отряды</h2>

                <ol>

                    <li><a href="/">Главная</a></li>
                    <li>Отряды</a></li>
                    <li><?php echo $otryad->name ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Blog Section -->

    <!-- ======= About Section ======= -->
    <section class="about" data-aos="fade-up">
        <div class="container">




                    <?php echo $otryad->info ?>



        </div>
    </section><!-- End About Section -->
</main><!-- End #main -->
<?php include 'footer.php'; ?>
