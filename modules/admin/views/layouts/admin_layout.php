<?php
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
</head>
<body>

<?php $this->beginBody() ?>

<div class="mainWrap">

  <!--Начало Header-->
  <header class="wrap">
    <div class="container admin">
      <a class="logo" style="display: none;">
        <img src="/images/logo.png" alt="Logo" />
      </a>

      <nav id="nav-desktop">
        <?= Menu::widget([
          'options' => ['class' => 'menu'],
          'encodeLabels' => false,
          'items' => [
            ['label' => 'Панель Администратора', 'url' => ['/admin/']],
            ['label' => '<span class="glyphicon glyphicon-pencil"></span> Главная', 'url' => ['/admin/index/index']],
            ['label' => '<span class="glyphicon glyphicon-pencil"></span> Продукция', 'url' => ['/admin/products/index']],
            ['label' => '<span class="glyphicon glyphicon-pencil"></span> Услуги', 'url' => ['/admin/services/index']],
            ['label' => '<span class="glyphicon glyphicon-pencil"></span> Галерея', 'url' => ['/admin/gallery/index']],
            ['label' => '<span class="glyphicon glyphicon-pencil"></span> Прайс-лист', 'url' => ['/admin/price/index']],
            ['label' => '<span class="glyphicon glyphicon-pencil"></span> Контакты', 'url' => ['/admin/contacts/index']],
            ['label' => ' | '],
            ['label' => '<span class="glyphicon glyphicon-home"></span> Вернуться на сайт', 'url' => ['/index']],
          ],
          'activeCssClass' => 'current_page_item',
        ]);
        ?>
      </nav>
    </div>
    <!--end container-->
  </header>
  <!--Конец Header-->

  <?= $content ?>

</div>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>
