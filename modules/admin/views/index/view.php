<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Index */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Главная', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'text:html',
        ],
    ]) ?>

</div>
