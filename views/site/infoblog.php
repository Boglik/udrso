<?php include 'header.php'; ?>
<?php
use yii\helpers\Html; // разрешить использовать объект Html
$this->title = $model->title . ' - Студенческие Отряды Удмуртской Республики';
?>

<title><?= Html::encode($this->title) ?></title>
    <main id="main">
     <!-- ======= Blog Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Блог</h2>

                    <ol>

                        <li><a href="/"><font color="white">Главная</font></a></li>
                        <li><a href="/blog"><font color="white">Блог</font></a></li>
                        <li><?php echo $model->title ?></li>
                    </ol>
                </div>

            </div>
        </section><!-- End Blog Section -->

        <!-- ======= Blog Section ======= -->
        <section class="blog" data-aos="fade-up">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">
                            <div class="card-img">
                                <img src="/<?= $model->images ?>" alt="" class="img-arhive">
                            </div>
<hr>
                            <h2 class="entry-title">
                                <?= $model->title ?></h2>
<hr>
                            <div class="entry-content">
                                <?= $model->text ?></h2>

                            </div>


                        </article><!-- End blog entry -->


                </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

<!--                            <h3 class="sidebar-title">Поиск</h3>-->
<!--                            <div class="sidebar-item search-form">-->
<!--                                <form action="">-->
<!--                                    <input type="text">-->
<!--                                    <button type="submit"><i class="icofont-search"></i></button>-->
<!--                                </form>-->
<!--                            </div><!-- End sidebar search formn-->

<!--                            <h3 class="sidebar-title">Категории</h3>-->
<!--                            <div class="sidebar-item categories">-->
<!--                                <ul>-->
<!--                                    <li><a href="/">Главная</a></li>-->
<!--                                    <li><a href="#">Новости <span>(25)</span></a></li>-->
<!--                                    <li><a href="#">События <span>(12)</span></a></li>-->
<!--                                    <li><a href="#">Объявления <span>(5)</span></a></li>-->
<!--                                    <li><a href="#">Работа <span>(22)</span></a></li>-->
<!--                                </ul>-->
<!---->
<!--                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Последние новости</h3>
                            <?php foreach ($blog as $item): ?>
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="/<?php echo $item->images ?>" alt="">
                                    <h4><a href="/blog/<?= $item->alias ?>"><?= $item->title ?></a></h4>
                                </div>

                            </div><!-- End sidebar recent posts-->
                            <?php endforeach ?>

                            <h3 class="sidebar-title">Новости группы</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>

                                    <!-- VK Widget -->
                                    <div id="vk_groups"></div>
                                    <script type="text/javascript">
                                        VK.Widgets.Group("vk_groups", {mode: 4, width: "auto", height: "400"}, 367132);
                                    </script>
                                </ul>
                                <h3 class="sidebar-title">Теги</h3>
                                <div class="sidebar-item tags">
                                    <ul>
                                        <li><a href="#">СПО</a></li>
                                        <li><a href="#">СОП</a></li>
                                        <li><a href="#">РСО</a></li>
                                        <li><a href="#">Школа Вожатых</a></li>
                                        ,<li><a href="#">Целина</a></li>
                                        <li><a href="#">Спорт</a></li>
                                    </ul>

                                </div><!-- End sidebar tags-->
                            </div><!-- End sidebar tags-->
                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

            </div><!-- End container -->

        </section><!-- End Blog Section -->

    </main><!-- End #main -->



<?php include 'footer.php'; ?>