<?php

use app\components\contact;

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Zayavki_na_otryad */

/* @var $form yii\widgets\ActiveForm */
?>
<?php include 'header.php'; ?>
<!-- начало видео блока -->
    <div class="fullscreen-bg">
        <div class="overlay">
        </div>
        <video loop="" muted="" autoplay="" poster="/assets/video/kadr.png" class="fullscreen-bg__video">
            <source src="/assets/video/video.mp4" type="video/mp4">
        </video>
    </div>
    <!-- конец видео блока -->
<br>
<!-- ======= СЛАЙДШОУ ======= -->
    <section class="services" data-aos="fade-up" >
        <div class="container">

            <!--gallery-->
<!-- <?php include('slideshow.php'); ?>
<!-- gallery-->

            </div>

        </div>
    </section><!--КОНЕЦ СЛАЙДШОУ -->
    <!-- ======= ФОТОГРАФИЯ ШАПКИ ОТРЯДА ======= -->
    <section id="about">
    <div class="container">
        <div class="text-intro">
            <div class="section-title">
                <h2>РСО - ЭТО</h2>
            </div>
            <p class="font-italic">
            <p style="text-align: center;"><strong>Удмуртское региональное отделение &laquo;Российских Студенческих Отрядов&raquo;</strong><em>&nbsp;&mdash; это социально-ориентированная некоммерческая организация, которая занимается временным трудоустройством молодёжи, изъявившей</em><br />
                <em>желание в свободное от учебы время работать в различных отраслях экономики,</em><br />
                <em>а также занимается гражданским и патриотическим воспитанием,</em><br />
                <em>развивает творческий и спортивный потенциал молодежи.</em></p>
            </p>
        </div>
    </div>
</section>
<main id="main">


    <!-- ======= ФАКТЫ ОБ УРО МООО РСО ======= -->
<section class="facts section-bg" data-aos="fade-up">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">6</span>
            <p>НАПРАВЛЕНИЙ</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">52</span>
            <p>ОТРЯДА</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1.800</span>
            <p>БОЙЦОВ УРО МООО "РСО"</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">400</span>
            <p>КАНДИДАТОВ КАЖДЫЙ ГОД</p>
          </div>

        </div>

      </div>
    </section><!-- КОНЕЦ ФАКТАМ -->
<BR>

    <!-- ======= Service Details Section ======= -->
    <section class="service-details">
      <div class="container">
      <div class="section-title">
          <h2>НОВОСТИ</h2>
                </div>
        <div class="row">
        <?php foreach ($blog as $item): ?>
          <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
              <img src="<?php echo $item->images ?>" alt="<?php echo $item->title ?>">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $item->title ?></h5>
                <p class="card-text"><?php echo \yii\helpers\StringHelper::truncateWords($item['text'], 35, ' ...'); ?></p>
                <br>
                <div class="read-more"><a href="/blog/<?php echo $item->alias?>"><i class="icofont-arrow-right"></i>Далее</a></div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>

      </div>
    </section><!-- Конец новостному блогу -->

    <!-- ======= Журнал Костер++ ======= -->
    <section class="services">
      <div class="container">
      <div class="section-title">
          <h2>Журнал КОСТЕР+</h2>
          <p>Газета кандидатов, бойцов и стариков студенческих отрядов Удмуртии «Костёр+», издаётся 1 раз в квартал, тираж 500 экземпляров</p>

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

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2>НАШИ ОБЪЕДИНЕНИЯ</h2>
       </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="/images/SOF2.png" class="img-souz" alt="">
          </div>
          <div class="col-md-7 pt-4">
            <h3>Союз Отрядных Гитаристов</h3>
            <p class="font-italic">
            <strong>Союз Отрядых Фотографов (СОФ)</strong> — организация, обеспечивающая информационную поддержку, а именно — фото и видеосъемку мероприятий УРО МООО «РСО». Союз отрядных фотографов был основан 23 октября 2012 года на Фестивале студенческих отрядов Удмуртии.
            </p>
            <ul>
                <br>
             <li> Если у тебя есть фотоаппарат и ты не можешь без него жить, хочешь быть в центре всех отрядных мероприятий и готов развиваться вместе с нами, значит нам нужен именно ты!
</li>
<div class="connect"><a href="https://vk.com/sof_udm" target="_blank"><div class="connect_knopka">Присоединиться</div></a></div>

            </ul>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
          <img src="/images/SOG3.png" class="img-souz" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Союз Отрядных Фотографов</h3>
            <p class="font-italic">
            <strong>Союз Отрядных Гитаристов (СОГ)</strong> — это то место, где каждый человек, который знает и любит отрядные песни, может найти своих единомышленников.
             Официальной датой создания принято считать 17 октября 2017 года.<br>
            </p>
            <br>
            <p>
            Нам ещё мало лет, но за эти годы у нас появились значки, были написаны песни,
            проведено огромное количество спевок и сформировались традиции.
            У нас всё ещё впереди, если ты хочешь стать частью нашей истории, стать одним из нас,
            то бери гитару в руки и Добро пожаловать!
            </p><br>
            <div class="connect"><a href="https://vk.com/sof_udm" target="_blank"><div class="connect_knopka">Присоединиться</div></a></div>

          </div>
        </div>
     </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->

<?php include 'footer.php'; ?>
<!--<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>-->
<!--<div id="hidden_mobile">-->
<!--<div id="vk_community_messages"></div>-->
<!--<script type="text/javascript">-->
<!--VK.Widgets.CommunityMessages("vk_community_messages", 367132, {widgetPosition: "left",tooltipButtonText: "Есть вопрос?"});-->
<!--</script>-->
<!--</div>-->
