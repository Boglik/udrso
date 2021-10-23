<?php include 'header.php'; ?>
    <main id="main">
        <!-- ======= Секция хлебных крошек ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">

                    <h2><?php echo $item->name ?></h2>

                    <ol>
                        <li><a href="/">Главная</a></li>
                        <li>Отряды РСО</li>
                    </ol>
                </div>

            </div>
        </section>
        <section class="team" data-aos="fade-up">
            <div class="container">

                <div class="row">
                    <?php foreach ($otryad as $item): ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <div class="member-img">
                                    <center><img src="/uploads/avatars/<?php echo $item->avatar?>" class="img-otryad" alt="" ></center>
                                    <div class="social">
                                        <a href="<?php echo $item->vk?>"><i class="icofont-vk"></i></a>
                                        <a href="<?php echo $item->inst?>"><i class="icofont-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="member-info" >
                                    <h4><a href="/otryady/<?php echo $item->alias ?>"><font color="#ff0000"><?php echo $item->name ?></font></h4></a>
                                    <span><?php echo $item->name_stab ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
    </main>
<?php include 'footer.php'; ?>