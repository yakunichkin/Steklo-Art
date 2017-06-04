<?php

use yii\helpers\Html;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Faq */

$title = $model->title;
$product_id = $model->product_id;
$productName = Products::getProductName($product_id);

$this->title = 'Обновить выпадающий блок: ' . $title;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Продукт №'.$product_id .': '.$productName, 'url' => ['/admin/products/update', 'id' => $product_id]];
$this->params['breadcrumbs'][] = ['label' => 'Выпадающий блок: '.$title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>

<div class="faq-update">

  <h2><?= Html::encode($this->title) ?></h2>
  <?= $this->render('_form', [
    'model' => $model,
    'product_id' => $product_id,
    'productName' => $productName
  ]) ?>

</div>
