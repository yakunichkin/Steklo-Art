<?php
$this->title = 'Прайс-лист';
?>

<div class="wrap">
  <div class="container home-apoint">
    <div class="row">
      <div class="span12 home-apoint-text">
        <h2>Прайс-лист</h2>
      </div>
    </div>
    <!--Конец row--> </div>
  <!--Конец container-->
</div>
<!--Конец wrap-->

<div class="wrap margin-block">
  <div class="container">

    <div class="row main-table">

      <div class="span12 table-column">
        <h4 class="pt-title">
          <div class="pull-left pt-title-50">
            <span class="pull-left">Наименование</span>
          </div>
          <div class="pull-left pt-title-50">
            <span class="pull-right">Цена</span>
          </div>
        </h4>
        <br>
        <ul class="pt-features">
          <?php if (!empty($allPrices)): ?>
            <?php foreach ($allPrices as $price): ?>
              <li class="clearfix">
              <div class="pt-item-title"><?= $price->name; ?></div>
              <div class="pt-item-price">от <?= $price->price; ?> грн</div>
              </li>
            <?php endforeach; ?>
          <?php endif;?>
        </ul>
      </div>
      <!--Конец table-col -->
    </div>
    <!--Конец row-->
  </div>
  <!--Конец container-->
</div>
<!--Конец wrap-->