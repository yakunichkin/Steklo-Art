<?php

use yii\helpers\Html;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Faq */
/* @var $requestId integer */

$productName = Products::getProductName($requestId);

$this->title = 'Создание нового выпадающего блока';
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['/admin/products/index']];
// Если $requestId не равен null, тогда в breadcrumbs добавим запись с ID продукции, с которой был переход на эту страницу
if ($requestId !== null){
  $this->params['breadcrumbs'][] = [
    'label' => 'Продукт №'.$requestId .': '.$productName,
    'url' => ['/admin/products/update', 'id' => $requestId]
  ];
} else $requestId = null;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="faq-create">

  <h2><?= Html::encode($this->title) ?></h2>
  <br>
  <?= $this->render('_form', [
    'model' => $model,
    'requestId' => $requestId,
    'productName' => $productName
  ]) ?>

</div>
