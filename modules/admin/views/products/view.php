<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Faq;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Продукт №'. $model->id . ': ' . $this->title;
?>
<div class="products-view">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <p>
    <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Вы уверены, что хотите удалить данную позицию?',
        'method' => 'post',
      ],
    ]) ?>
  </p>
  <br>
  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'id',
      'name',
      'text:html',
      [
        'attribute' => 'main_img',
        'format' => 'html',
        'value' => $model->imageProductPreview(true, $model::NUMBER_MAIN),
      ],
      [
        'attribute' => 'img_1',
        'format' => 'html',
        'value' => $model->imageProductPreview(true, $model::NUMBER_1),
      ],
      [
        'attribute' => 'img_2',
        'format' => 'html',
        'value' => $model->imageProductPreview(true, $model::NUMBER_2),
      ],
      [
        'attribute' => 'img_3',
        'format' => 'html',
        'value' => $model->imageProductPreview(true, $model::NUMBER_3),
      ],
      [
        'label' => 'Выпадающие блоки',
        'format' => 'html',
        'value' => Faq::getFaqBlocks($model->id),
      ],
    ],
  ]) ?>
  <br>
  <p>
    <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => 'Вы уверены, что хотите удалить данную позицию?',
        'method' => 'post',
      ],
    ]) ?>
  </p>
  <br>
</div>
