<?php
use app\modules\admin\models\UploadForm;
use yii\widgets\Menu;
use app\controllers\AppController;
use app\modules\admin\models\Faq;
use app\modules\admin\models\Products;

/* @var $oneProduct object */
/* @var $product_id integer */
/* @var $faqTriggers array */

$this->title = $oneProduct->name;
//$img_1 = $oneProduct->img_1;
//$img_2 = $oneProduct->img_2;
//$img_3 = $oneProduct->img_3;
$path = '../images/products/';
//$noImage = '../images/no-image.jpg';
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
            <?php if($oneProduct->main_img) echo '<img src="'. AppController::ifImageExists($oneProduct->main_img, UploadForm::TYPE_PRODUCT) .'">' ; ?>
            <?= $oneProduct->text ?>
            <br>
            <?php if($oneProduct->img_1) echo '<img src="'. AppController::ifImageExists($oneProduct->img_1, UploadForm::TYPE_PRODUCT) .'">' ; ?>
            <?php if($oneProduct->img_2) echo '<img src="'. AppController::ifImageExists($oneProduct->img_2, UploadForm::TYPE_PRODUCT) .'">' ; ?>
            <?php if($oneProduct->img_3) echo '<img src="'. AppController::ifImageExists($oneProduct->img_3, UploadForm::TYPE_PRODUCT) .'">' ; ?>
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
                  <?= '<img src="'. AppController::ifImageExists($oneFaq->image, UploadForm::TYPE_FAQ) .'">'; ?>
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