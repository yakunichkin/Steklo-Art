<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <p>
    <?= Html::a('Назад', ['/admin/'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Добавить новую позицию', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
  <br>
  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'name',
      [
        'attribute' => 'main_img',
        'label' => 'Предпросмотр',
        'format' => 'html',
        'value' => function($data){
          if ($data->main_img){
            return '<img src="/images/products/'. $data->main_img .'" height="50">';
          } else {
            return '<img src="/images/no-image.jpg" height="50">';
          }
        },
      ],

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>
</div>
<br>
<p>
  <?= Html::a('Назад', ['/admin/'], ['class' => 'btn btn-primary']) ?>
  <?= Html::a('Добавить новую позицию', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<br>