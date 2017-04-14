<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Faq;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Продукт №'. $model->id . ': ' . $this->title;
?>
<div class="products-view">

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
      'text:html',
      [
        'attribute' => 'main_img',
        'format' => 'html',
        'value' => function($data)
        {
          return '<img src="../../images/products/'. $data->main_img .'" width="170">';
        }
      ],
      [
        'attribute' => 'img_1',
        'format' => 'html',
        'value' => function($data)
        {
          return $data->img_1 ? '<img src="../../images/products/'. $data->img_1 .'" width="170">' : null;
        }
      ],
      [
        'attribute' => 'img_2',
        'format' => 'html',
        'value' => function($data)
        {
          return $data->img_2 ? '<img src="../../images/products/'. $data->img_2 .'" width="170">' : null;
        }
      ],
      [
        'attribute' => 'img_3',
        'format' => 'html',
        'value' => function($data)
        {
          return $data->img_3 ? '<img src="../../images/products/'. $data->img_3 .'" width="170">' : null;
        }
      ],
      [
        'label' => 'Выпадающие блоки',
        'format' => 'html',
        'value' => function($data)
        {
          $array = $data->id ? Faq::getFaq($data->id) : null;
          if ($array)
          {
            $i = 1;
            $allBlocks = '<div class="faq-questions">';
            foreach ($array as $item)
            {
              $allBlocks .= '<h4 class="trigger"><a href="#q'.$i.'">'.$item->title.'</a></h4>'.
                '<div id="q<?=$i?>" class="toggle_container">'.
                '<img src="../../images/products/prod-img-'.$data->id.'-mini-'.$i.'.jpg">'.$item->text.'</div>';
              $i++;
            }
            $allBlocks .= '</div>';
            return $allBlocks;
          }
          else{
            return null;
          }
        }
      ],
    ],
  ]) ?>

</div>
