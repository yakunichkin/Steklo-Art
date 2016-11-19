<?php
use yii\widgets\Menu;
$this->title = 'Администратор';
?>
<h4 class="text-center">Редактирование всех данных на сайте:</h4>
<br>
<div class="wrap">
  <div class="container">

      <?= Menu::widget([
        'options' => ['class' => 'admin-index-preview'],
        'encodeLabels' => false,
        'items' => [
          ['label' => '<img src="/images/admin/index-1.jpg" alt="Главная" width="370" height="208"/>', 'url' => ['/admin/index/index']],
          ['label' => '<img src="/images/admin/index-2.jpg" alt="Продукция" width="370" height="208"/>', 'url' => ['/admin/products/index']],
          ['label' => '<img src="/images/admin/index-3.jpg" alt="Услуги" width="370" height="208"/>', 'url' => ['/admin/services/index']],
          ['label' => '<img src="/images/admin/index-4.jpg" alt="Галерея" width="370" height="208"/>', 'url' => ['/admin/gallery/index']],
          ['label' => '<img src="/images/admin/index-5.jpg" alt="Прайс-лист" width="370" height="208"/>', 'url' => ['/admin/price/index']],
          ['label' => '<img src="/images/admin/index-6.jpg" alt="Контакты" width="370" height="208"/>', 'url' => ['/admin/contacts/index']],
        ],
      ]);
      ?>

  </div>
  <!--Конец container-->
</div>
<!--Конец Галерея-->