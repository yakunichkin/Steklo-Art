<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Index */

$this->title = 'Создание новой позиции';
$this->params['breadcrumbs'][] = ['label' => 'Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-create">

  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>
