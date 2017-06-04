<?php

use app\modules\admin\models\Faq;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $modelFaq app\modules\admin\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <div class="form-group">
    <?php
    if($model->id) {
      $route = ['view', 'id' => $model->id];
    } else {
      $route = ['index'];
    }
    ?>
    <?= Html::a('Вернуться назад без сохранения', $route, ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
  </div>
  <br>

  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'text')->widget(CKEditor::className(),
    [
      'editorOptions' =>
        [
          'preset' => 'standart',
          'inline' => false,
        ],
    ]);
  ?>

  <hr>
  <?php if (!$model->isNewRecord): ?>
    <label>Главное изображение</label>
    <?= $model->imageProductPreview(true, $model::NUMBER_MAIN); ?>
    <br><br>
    <label>Доп.изображение 1</label>
    <?= $model->imageProductPreview(true, $model::NUMBER_1); ?>
    <br><br>
    <label>Доп.изображение 2</label>
    <?= $model->imageProductPreview(true, $model::NUMBER_2); ?>
    <br><br>
    <label>Доп.изображение 3</label>
    <?= $model->imageProductPreview(true, $model::NUMBER_3); ?>
    <br><br>
  <?php endif; ?>

  <?php if (!$model->isNewRecord): ?>
    <?php if ($model->id)
      $dataProviderFaq = new ActiveDataProvider([
        'query' => Faq::find()->where('product_id = '.$model->id),
      ]);
    ?>
    <hr>
    <div class="form-group">
      <?= GridView::widget([
        'dataProvider' => $dataProviderFaq,
        'showOnEmpty' => false,
        'emptyText' => '<label>Выпадающие блоки еще не были созданы...</label>',
        'summary' => '<label>Редактирование выпадающих блоков:</label>',
        'columns' => [
          'title',
          'text:html',
          [
            'attribute' => 'image',
            'format' => 'html',
            'value' => function($data){
              if ($data->image) {
                $imagePath = '/images/faq/'. $data->image;
              } else {
                $imagePath = '/images/no-image.jpg';
              }
              return '<img src="'.$imagePath.'" width="100" height="62">';
            }
          ],
          [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия',
            'template' => '{view}{update}{delete}',
            'urlCreator' => function($action, $modelFaq, $key, $index) {
              switch ($action){
                case 'view':
                  return Url::toRoute(['/admin/faq/view', 'id' => $modelFaq->id]);
                  break;
                case 'update':
                  return Url::toRoute(['/admin/faq/update', 'id' => $modelFaq->id]);
                  break;
                case 'delete':
                  return Url::toRoute(['/admin/faq/delete', 'id' => $modelFaq->id, 'product_id' => $modelFaq->product_id]);
                  break;
                default:
                  return null;
                  break;
              }
             }
          ],
        ],
      ]); ?>
      <br>
      <?= Html::a('Создать новый блок', ['/admin/faq/create', 'product_id' => $model->id], ['class' => 'btn btn-success']) ?>
      <br>
    </div>
    <hr>
  <?php endif; ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', $route, ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
