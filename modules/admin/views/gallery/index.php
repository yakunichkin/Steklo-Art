<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">

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

        'title',
        //'image',

        ['class' => 'yii\grid\ActionColumn'],
      ],
    ]); ?>
</div>
<br>
<p>
    <?= Html::a('Вернуться назад', ['/admin/'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Добавить новую позицию', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<br>
