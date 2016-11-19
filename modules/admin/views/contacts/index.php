<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Вернуться назад', ['/admin/'], ['class' => 'btn btn-primary']) ?>
    </p>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'address',
            'phone_1',
            'phone_2',
            'email:email',
            'skype',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<br>
<p>
    <?= Html::a('Вернуться назад', ['/admin/'], ['class' => 'btn btn-primary']) ?>
</p>
<br>