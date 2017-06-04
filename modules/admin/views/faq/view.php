<?php

use app\modules\admin\models\Faq;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Faq */

$productName = Products::getProductName($model->product_id);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['/admin/products/']];
$this->params['breadcrumbs'][] = [
  'label' => 'Продукт №'.$model->product_id .': '. $productName,
  'url' => ['/admin/products/update', 'id' => $model->product_id]
];
$this->params['breadcrumbs'][] = 'Выпадающий блок: '.$this->title;
?>
<div class="faq-view">

  <h2><?= Html::encode($this->title) ?></h2>
  <br>
  <p>
    <?= Html::a('Назад', ['/admin/products/update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Редактировать', ['update', 'id' => $model->id, 'product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
      ],
    ]) ?>
  </p>
  <br>
  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'id',
      [
        'label' => 'Изображение',
        'format' => 'html',
        'value' => function($data)
        {
          if ($data->image){
            $returnImage = '<img src="/images/faq/'.$data->image.'" width="150" height="84">&nbsp;&nbsp;';
            $returnImage .= Html::a('Заменить', ['/admin/faq/image', 'id' => $data->id, 'product_id' => $data->product_id], ['class' => 'btn btn-info']);
          } else {
            $returnImage  = '<img src="/images/no-image.jpg" width="150" height="84">&nbsp;&nbsp;';
            $returnImage .= Html::a('Добавить', ['/admin/faq/image', 'id' => $data->id, 'product_id' => $data->product_id], ['class' => 'btn btn-success']);
          }
          return $returnImage;
        }
      ],
      [
        'attribute' => 'product_id',
        'format' => 'html',
        'value' => $productName,
      ],
      'title',
      'text:html',
    ],
  ]) ?>

</div>
