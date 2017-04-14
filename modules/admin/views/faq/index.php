<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Выпадающие блоки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <p>
    <?= Html::a('Вернуться назад', ['/admin/'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Добавить новую позицию', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
  <br>
  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      [
        'attribute' => 'product_id',
        'format' => 'html',
        'value' => function($data)
        {
          return Products::getProductName($data->product_id);
        }
      ],
      'title',
      'text:html',

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>
</div>
