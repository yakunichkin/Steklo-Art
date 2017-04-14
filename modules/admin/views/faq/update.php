<?php

use yii\helpers\Html;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Faq */
$productName = Products::getProductName($model->product_id);

$this->title = 'Обновить выпадающий блок: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Продукт №'.$model->product_id .': '.$productName, 'url' => ['/admin/products/update', 'id' => $model->product_id]];
$this->params['breadcrumbs'][] = ['label' => 'Блок: '.$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>

<div class="faq-update">

  <h2><?= Html::encode($this->title) ?></h2>
  <br>
  <?= $this->render('_form', [
    'model' => $model,
    'requestId' => $requestId,
    'productName' => $productName
  ]) ?>

</div>
