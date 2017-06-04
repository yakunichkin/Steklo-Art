<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Продукт №'. $model->id .': '. $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="products-update">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <?= $this->render('_form', compact('model')) ?>

</div>
