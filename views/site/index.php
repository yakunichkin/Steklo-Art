<?php
$this->title = 'Главная';
?>

<!--Начало Слайдер-->
<div class="wrap">

  <div class="flexslider-top">
    <ul class="slides">

      <?php if (!empty($allSlider)): ?>
        <?php foreach($allSlider as $slider): ?>
        <li>
          <a href="/contact">
            <img src="images/home/slider-<?= $slider->id ?>.jpg" alt="<?= $slider->title ?>" />
          </a>
          <div class="flex-caption">
            <span><?= $slider->title ?></span>
          </div>
        </li>
        <?php endforeach; ?>
      <?php endif;?>

    </ul>

  </div>
  <!--Конец flexslider-->
</div>
<!--Конец Слайдера-->

<!--Начало Преимущества-->
<div class="wrap">
  <div class="container">
    <div class="row">
      <div class="home-title span12 margin-block">
        <h3>Преимущества изделий из стекла:</h3>
      </div>

          <?php for ($i=0; $i<=3; $i++): ?>
          <div class="span3 home-feature-2">
            <p class="img-feature">
              <img src="images/home/index-<?= $allIndex[$i]['id'] ?>.png" alt="<?= $allIndex[$i]['title'] ?>"/>
            </p>
            <h2><?= $allIndex[$i]['title'] ?></h2>
            <p class="text-center">
              <?= $allIndex[$i]['text'] ?>
            </p>
          </div>
          <?php endfor?>

    </div>
    <!--Конец row-->
  </div>
  <!--Конец container-->
</div>
<!--Конец Преимущества-->

<?= $this->context->myIndexDivider(); ?>

<!--Начало Наша продукция-->
<div class="wrap">
  <div class="container">
    <div class="row">
      <div class="span12 margin-block">
        <header class="home-title">
          <h3>Наша продукция:</h3>
        </header>
        <div class="row">

          <?php for ($i=4; $i<=6; $i++): ?>
            <div class="span4 block-3col">
              <div class="gal-img">
                <a href="/contact">
                  <img src="images/gallery/gal-<?= $allIndex[$i-4][id] ?>.jpg" alt="<?= $allIndex[$i][title] ?>"/>
                </a>
                <!--end work-more-->
              </div>
              <!--end 3col-img-->
              <div class="cases-text">
                <h4 class="title-gal-post">
                  <a href="/contact"><?= $allIndex[$i][title] ?></a>
                </h4>
                <p>
                  <?= $allIndex[$i][text] ?>
                </p>
              </div>
            </div>
          <?php endfor?>

        </div>
        <!--row-->
      </div>
      <!--Конец span12-->
    </div>
    <!--Конец row-->
  </div>
  <!--Конец container-->
</div>
<!--Конец Наша продукция-->

<?= $this->context->myIndexDivider(); ?>

<!--Начало Почему именно мы-->
<div class="wrap">
  <div class="container">
    <div class="row">
      <div class="span12 margin-block">
        <header class="home-title">
          <h3>Почему именно мы:</h3>
        </header>
        <div class="row">

          <?php for ($i=7; $i<=9; $i++): ?>

              <div class="span4 block-3col">
                <div class="news-info">
                </div>
                <div class="gal-img">
                  <a href="/contact">
                    <img src="images/home/news-<?= $allIndex[$i-7][id] ?>.jpg" alt="<?= $allIndex[$i][title] ?>"/>
                  </a>
                </div>
                <!--end gal-img-->
                <div class="news-text">
                  <h4 class="title-gal-post">
                    <a href="/contact"><?= $allIndex[$i][title] ?></a>
                  </h4>
                  <p>
                    <?= $allIndex[$i][text] ?>
                  </p>
                </div>
              </div>

          <?php endfor?>

        </div>
        <!--row-->
      </div>
      <!--Конец span12-->
    </div>
    <!--Конец row-->
  </div>
  <!--Конец container-->
</div>
<!--Конец Почему именно мы-->
