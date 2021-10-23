<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/pagination.css">
    <title><?= Html::encode($this->title) ?></title>
<?php include 'header.php'; ?>


    <main id="main">

        <!-- ======= Blog Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Блог</h2>

                    <ol>
                        <li><a href="/"><font color="white">Главная</font></a></li>
                        <li>Блог</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Blog Section -->

        <!-- ======= Blog Section ======= -->
        <section class="blog" data-aos="fade-up">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8 entries">
                <?php foreach($posts as $post): ?>
                        <article class="entry">

                            <div class="entry-img">
                                <img src="<?php echo $post->images ?>" alt="<?php echo $post->title ?>">
                            </div>

                            <h2 class="entry-title">
                                <a href="/blog/<?= $post->alias ?>"><?= $post->title ?></a>
                            </h2>


                            <div class="entry-content">
                                <p class="card-text"><?php echo \yii\helpers\StringHelper::truncateWords($post['text'], 35, ' ...'); ?></p>

                                <div class="read-more">
                                    <a href="/blog/<?= $post->alias ?>">Читать</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->

                <?php endforeach; ?>
                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <div class="pagination"><?= LinkPager::widget([
                                        'pagination' => $pages,
                                        'prevPageLabel' => ' назад ',
                                        'nextPageLabel' => ' далее ',
                                        'maxButtonCount' => 5,

                                    ]); ?></div>
                            </ul>

                        </div>

                    </div><!-- End blog entries list -->
                    <div class="col-lg-4">

                        <div class="sidebar">

<!--                            <h3 class="sidebar-title">Поиск</h3>-->
<!--                            <div class="sidebar-item search-form">-->
<!--                                <form action="">-->
<!--                                    <input type="text">-->
<!--                                    <button type="submit"><i class="icofont-search"></i></button>-->
<!--                                </form>-->
<!--                            </div>End sidebar search formn-->
<!---->
<!--                            <h3 class="sidebar-title">Категории</h3>-->
<!--                            <div class="sidebar-item categories">-->
<!--                                <ul>-->
<!--                                    <li><a href="#">Главная</a></li>-->
<!--                                    <li><a href="#">Новости <span>(25)</span></a></li>-->
<!--                                    <li><a href="#">События <span>(12)</span></a></li>-->
<!--                                    <li><a href="#">Объявления <span>(5)</span></a></li>-->
<!--                                    <li><a href="#">Работа <span>(22)</span></a></li>-->
<!--                                </ul>-->
<!---->
<!--                            </div>End sidebar categories-->

                            <h3 class="sidebar-title">Последние новости</h3>
                            <?php foreach($posts as $post): ?>
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="<?php echo $post->images ?>" alt="">
                                    <h4><a href="/blog/<?= $post->alias ?>"><?= $post->title ?></a></h4>
                                </div>
                            </div><!-- End sidebar recent posts-->
                            <?php endforeach; ?>
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

                            </div><!-- End sidebar tags-->

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->
                    <div class="col-lg-4">


                </div><!-- End .row -->

            </div><!-- End .container -->

        </section><!-- End Blog Section -->

    </main><!-- End #main -->

<?php include 'footer.php'; ?>