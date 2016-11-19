<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Services */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-view">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <p>
    <?= Html::a('Вернуться назад', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
  </p>
  <br>
  <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'id',
      'name',
      'text:ntext',
    ],
  ]) ?>

</div>
