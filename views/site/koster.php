<?php

use site\components\contact;

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model site\models\Zayavki_na_otryad */

/* @var $form yii\widgets\ActiveForm */
?>
<meta property="og:title" content="Костер | Студенческие отряды Удмуртской Республики"/>
<meta property="og:description" content="Сайт студенческих отрядов Удмуртской Республики - Региональное отделение"/>
<meta property="og:image" content="https://udrso.ru/uploads/koster/2021/04/02/1_20jpg_pages-to-jpg-0001.jpg"/>
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="300" />
<meta property="og:url" content= "https://udrso.ru/koster" />
<?php include 'header.php'; ?>

    <main id="main">


        <!-- ======= Журнал Костер++ ======= -->
        <section class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Журнал КОСТЕР+</h2>
                    <p>Бесплатная ежемесячная газета</p>

                </div>
                <div class="row">
                    <?php foreach ($koster as $item): ?>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                            <div class="icon"><img src="<?php echo $item->images?>" />
                                <h4 class="title"><?php echo $item->title ?></a></h4>
                                <div class="download"><a href="<?php echo $item->files ?>"target="_blank"><div class="knopka">Скачать</div></a></div>

                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        </section><!-- Конец журнала -->


    </main><!-- End #main -->

<?php include 'footer.php'; ?>