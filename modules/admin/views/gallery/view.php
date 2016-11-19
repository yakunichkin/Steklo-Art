<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-view col-lg-8">

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
      //'id',
      'title',
      //'image',
    ],
  ]) ?>

  <?= $this->context->imagePreview($model); ?>

</div>
