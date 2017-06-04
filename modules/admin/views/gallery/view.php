<?php
//Очистка кэша браузера
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изображение: '.$this->title;
?>
<div class="gallery-view col-lg-8">

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

  <div class="span4 block-3col" style="margin-left: 0;">
    <div>
      <?= $model->imageGalleryPreview(370, 208, $model->title); ?>
    </div>
    <h4 class="gallery-text"><?= $model->title ?></h4>
  </div>
</div>
