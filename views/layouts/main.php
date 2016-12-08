<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\Menu;
AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
  <link rel="shortcut icon" href="/images/favicon.ico">
  <meta name="keywords" content="Стекло, перегородки, зеркала, душевые, витрины, закаленное стекло, кухонные фартуки">
  <meta name="description" content="Прирезка и обработка стекла и зеркал по выгодной цене в Днепре и области">
  <meta name="author" content="Дмитрий Якуничкин">
</head>
<body>

<?php $this->beginBody() ?>

<div class="mainWrap">

  <!--Начало Header-->
  <header class="wrap">
    <div class="container">
      <a href="/" class="logo">
        <img src="/images/logo.png" alt="Logo" />
      </a>

      <?php

      $menuItems[0] = ['label' => 'Главная', 'url' => ['/site/index']];
      $menuItems[] = ['label' => 'Продукция',
          'url' => ['/products/index'],
          'options'=>['class'=>'sub-menu'],
          'items' => $this->context->myGetProductsItemsLinkArray(), // Функция описана в контроллере AppController
        ];
      $menuItems[] = ['label' => 'Услуги', 'url' => ['/site/services']];
      $menuItems[] = ['label' => 'Галерея', 'url' => ['/site/gallery']];
      $menuItems[] = ['label' => 'Прайс-лист', 'url' => ['/site/prices']];
      $menuItems[] = ['label' => 'Контакты', 'url' => ['/site/contact']];
      ;

      if (!Yii::$app->user->isGuest)
      {
        $menuItems[] =
          [
            'label' => ' | '
          ];
        $menuItems[] =
          [
            'label' => '<span class="glyphicon glyphicon-tasks"></span> Редактор',
            'url' => ['/admin/']
          ];
        $menuItems[] =
          [
            'label' => '<span class="glyphicon glyphicon-log-out"></span> Выйти',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post'],
          ];
      }
      ?>

      <nav id="nav-desktop">
        <?= Menu::widget([
          'options' => ['class' => 'menu'],
          'encodeLabels' => false,
          'items' => $menuItems,
          'activeCssClass' => 'current_page_item',
        ]);
        ?>
      </nav>
    </div>
    <!--end container-->
  </header>
  <!--Конец Header-->

  <?= $content ?>

  <!--Начало Footer-->
  <footer class="wrap margin-block">
    <div class="container">
      <div class="row">

        <div class="span3 foo-block">
          <h3>Меню сайта</h3>
            <?= Menu::widget([
              'options' => ['class' => 'foo-news'],
              'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Продукция', 'url' => ['/products/index']],
                ['label' => 'Услуги', 'url' => ['/site/services']],
                ['label' => 'Галерея', 'url' => ['/site/gallery']],
                ['label' => 'Прайс-лист', 'url' => ['/site/prices']],
                ['label' => 'Контакты', 'url' => ['/site/contact']],
              ],
              'activeCssClass' => 'footer_current_page_item',
            ]);
            ?>
        </div>
        <!--end span3-->

        <div class="span3 foo-block">
          <h3>Продукция</h3>
          <?= Menu::widget([
            'options' => ['class' => 'foo-news'],
            'items' => $this->context->myGetProductsItemsLinkArray(1), // Функция описана в контроллере AppController
            'activeCssClass' => 'footer_current_page_item',
          ]);
          ?>
        </div>
        <!--end span3-->

        <div class="span3 foo-block">
          <h3>Продукция</h3>
          <?= Menu::widget([
            'options' => ['class' => 'foo-news'],
            'items' => $this->context->myGetProductsItemsLinkArray(2), // Функция описана в контроллере AppController
            'activeCssClass' => 'footer_current_page_item',
          ]);
          ?>
        </div>
        <!--end span3-->
        <div class="span3 foo-block">
          <h3>Контакты</h3>
          <ul class="foo-faq">

            <?php $this->context->myGetContacts(); // Функция описана в контроллере AppController ?>
            
          </ul>
        </div>
        <!--end span3-->
      </div>
      <!--end row-->
    </div>
    <!--end container-->
  </footer>
  <!--Конец Footer-->

  <!--Начало Copyright-->
  <div class="wrap copy-holder">
    <div class="container">
      <div class="row">
        <div class="span4 copyright text-center">
            <span>
              <a href="/"><?= Yii::$app->name ?></a>
              &copy; <?php echo date('Y') ?>
              Dnepr
            </span>
        </div>
        <div class="span4 copyright text-center">
            <span>
              <?php
              if(Yii::$app->user->isGuest)
              {
                echo 'Авторизация - ';
                echo Html::a('Войти', ['/login']);
              }
              else
              {
                echo 'Вы авторизованы. Чтобы закрыть доступ, нажмите - ';
                echo Html::a('Выйти', ['/logout']);
              }
              ?>
            </span>
        </div>
        <div class="span4 copyright text-center">
            <span>
              Created by
              <a href="https://vk.com/yakunichkin">Dmitriy Yakunichkin</a>
            </span>
        </div>
        <!--end copyright-->
      </div>
      <!--end row-->
    </div>
    <!--end container-->
  </div>
  <!--Конец Copyright-->

</div>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>
