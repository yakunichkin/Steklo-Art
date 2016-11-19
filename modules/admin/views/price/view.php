<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Price */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Прайс-лист', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-view">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <p>
    <?= Html::a('Вернуться назад', ['index'], ['class' => 'btn btn-primary']) ?>
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
      'price',
    ],
  ]) ?>

</div>
