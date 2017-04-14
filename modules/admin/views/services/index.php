<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Вернуться назад', ['/admin/'], ['class' => 'btn btn-primary']) ?>
    </p>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'name',
            'text:html',

          ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>
</div>
<br>
<p>
    <?= Html::a('Вернуться назад', ['/admin/'], ['class' => 'btn btn-primary']) ?>
</p>
<br>