<?php

use yii\helpers\Html;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Faq */
/* @var $product_id integer */
if ($product_id !== null) {
  $productName = Products::getProductName($product_id);
} else $productName = null;

$this->title = 'Создание нового выпадающего блока';
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['/admin/products/index']];
// Если $product_id не равен null, тогда в breadcrumbs добавим запись с ID продукции, с которой был переход на эту страницу
if ($product_id !== null){
  $this->params['breadcrumbs'][] = [
    'label' => 'Продукт №'.$product_id .': '.$productName,
    'url' => ['/admin/products/update', 'id' => $product_id]
  ];
} else $product_id = null;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="faq-create">

  <h2><?= Html::encode($this->title) ?></h2>
  <?= $this->render('_form', [
    'model' => $model,
    'product_id' => $product_id,
    'productName' => $productName
  ]) ?>

</div>
