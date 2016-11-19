<?php
use yii\helpers\Url;
use yii\widgets\Menu;

$this->title = $oneProduct->name;
?>

<div class="wrap">
  <div class="container home-apoint">
    <div class="row">
      <div class="span12 home-apoint-text">
        <h2><?= $oneProduct->name ?></h2>
      </div>
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</div>
<!--end wrap-->
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
                    'items' => $this->context->myGetProductsItemsLinkArray(), // Функция описана в контроллере AppController
                    'activeCssClass' => 'current_sidebar_item',
                  ]);
                  ?>
                  
                </div>
              </li>
              <!--end archive-->
            </ul>
                        
          </aside>
          <br>
          <div class="span12  faq-questions block-3col">
            <?php if(!empty($oneProduct->faq_trigger)){ echo $oneProduct->faq_trigger; } ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>