<?php include 'header.php'; ?>
    <main id="main">
    <!-- ======= Секция хлебных крошек ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">

                <h2>Региональный штаб</h2>

                <ol>
                    <li><a href="/">Главная</a></li>
                    <li>Региональный штаб</li>
                </ol>
            </div>

        </div>
    </section>
        <section class="team" data-aos="fade-up">
            <div class="container">

                <div class="row">
                    <?php foreach ($pravlenie as $item): ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <img src="/<?php echo $item->images?>" class="img-fluid" alt="" >
                                <div class="social">
                                    <a href=""><i class="icofont-vk"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4><?php echo $item->name ?></h4>
                                <span><?php echo $item->dolznost ?></span>
                                <p>Animi est delectus alias quam repellendus nihil nobis dolor. Est sapiente occaecati et dolore. Omnis aut ut nesciunt explicabo qui. Eius nam deleniti ut omnis repudiandae perferendis qui. Neque non quidem sit sed pariatur quia modi ea occaecati. Incidunt ea non est corporis in.</p>
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