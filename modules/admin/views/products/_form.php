<?php

use app\modules\admin\models\Faq;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $modelFaq app\modules\admin\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

  <?php $form = ActiveForm::begin(); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
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
  <?= $form->field($model, 'main_img')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'img_1')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'img_2')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'img_3')->textInput(['maxlength' => true]) ?>

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
        'emptyText' => '<label>Выпадающие блоки еще не были созданы</label>',
        'summary' => '<label>Редактирование выпадающих блоков:</label>',
        'columns' => [
          'title',
          'text:html',
          [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Действия',
            'template' => '{view}{update}{delete}',
            'urlCreator' => function ($action, $modelFaq, $key, $index) {
              if ($action === 'view') {
                return Url::toRoute(['/admin/faq/view', 'id' => $modelFaq->id]);
              }
              if ($action === 'update') {
                return Url::toRoute(['/admin/faq/update', 'id' => $modelFaq->id, 'product_id' => $modelFaq->product_id]);
              }
              if ($action === 'delete') {
                return Url::toRoute(['/admin/faq/delete', 'id' => $modelFaq->id, 'product_id' => $modelFaq->product_id]);
              }
            }
          ],
        ],
      ]); ?>
      <?= Html::a('Добавить новый', ['/admin/faq/create', 'product_id' => $model->id], ['class' => 'btn btn-info']) ?>
    </div>
    <hr>
  <?php endif; ?>

  <br>
  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
