<?php
use yii\widgets\Menu;
use app\controllers\AppController;
use app\models\Faq;

/* @var $oneProduct object */
/* @var $product_id integer */
/* @var $faqTriggers array */

$this->title = $oneProduct->name;
?>

<div class="wrap">
  <div class="container home-apoint">
    <div class="row">
      <div class="span12 home-apoint-text">
        <h2><?= $oneProduct->name ?></h2>
      </div>
    </div>
  </div>
</div>

<!--Начало Продукция-->
<div class="wrap margin-block">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="row">

          <div class="span9 product">
            <img src="../images/products/<?= $oneProduct->main_img ?>">
            <?= $oneProduct->text ?>
            <br>
            <?php
              if (!empty($oneProduct->img_1)){ echo '<img src="../images/products/' . $oneProduct->img_1 . '">'; }
              if (!empty($oneProduct->img_2)){ echo '<img src="../images/products/' . $oneProduct->img_2 . '">'; }
              if (!empty($oneProduct->img_3)){ echo '<img src="../images/products/' . $oneProduct->img_3 . '">'; }
            ?>
          </div>

          <aside class="span3">
            <ul>
              <li>
                <header class="sidebar-title">
                  <h3>Каталог продукции:</h3>
                </header>
                <div class="sidebar-archive">

                  <?= Menu::widget([
                    'items' => AppController::myGetProductsItemsLinkArray(), // Функция описана в контроллере AppController
                    'activeCssClass' => 'current_sidebar_item',
                  ]);
                  ?>
                  
                </div>
              </li>
            </ul>
          </aside>

          <br>

          <?php if(!empty($faqTriggers)): ?>
            <?php $i = 1; ?>
            <div class="span12 faq-questions block-3col">

              <?php foreach ($faqTriggers as $oneFaq): ?>
                <h4 class="trigger">
                  <a href="#q<?=$i?>">
                    <?= $oneFaq->title ?>
                  </a>
                </h4>
                <div id="q<?=$i?>" class="toggle_container">
                  <img src="../images/products/prod-img-<?=$product_id?>-mini-<?=$i?>.jpg">
                  <?= $oneFaq->text ?>
                </div>
                <?php $i++; ?>
              <?php endforeach; ?>

            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
<!--Конец Продукция-->