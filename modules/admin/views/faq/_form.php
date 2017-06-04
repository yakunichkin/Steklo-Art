<?php

use app\controllers\AppController;
use app\modules\admin\models\Faq;
use app\modules\admin\models\UploadForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Faq */
/* @var $requestId integer */
/* @var $productName string */
/* @var $id integer */
/* @var $product_id integer */

?>
<?php if($productName !== null): ?>
  <hr>
  <h4><label>Продукция - <?= $productName ?></label></h4>
  <hr>
<?php endif; ?>

<div class="faq-form">
  <?php $form = ActiveForm::begin(); ?>

  <?php
  if ($product_id !== null){
    // Если полученный параметр requestId не равен null, значит продукция в dropDownList будет выбрана по умолчанию по id
    echo $form->field($model, 'product_id')->textInput(['value' => $product_id, 'style' => 'display: none;'])->label('', ['style' => 'display: none;']);
  } else {
    echo '<br>';
    // Иначе, если не был передан id продукции, тогда будет предоставлен выбор из списка вручную
    echo $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Products::find()->all(), 'id', 'name'), [
      'prompt' => 'Выберите продукцию'
    ]);
  }
  ?>

  <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

  <?php if(!$model->isNewRecord && $product_id !== null): ?>
    <br>
    <label>Изображение выпадающего блока:</label>
    <br>
    <?= '<img src="'. AppController::ifImageExists($model->image, UploadForm::TYPE_FAQ) .'" width="150" height="84">'; ?>
    &nbsp;&nbsp;
    <?= Html::a('Заменить', ['/admin/faq/image', 'id' => $model->id, 'product_id' => $product_id], ['class' => 'btn btn-info']); ?>
    <br><br>
  <?php endif; ?>

  <?= $form->field($model, 'text')->widget(CKEditor::className(),
    [
      'editorOptions' =>
        [
          'preset' => 'standart',
          'inline' => false,
        ],
    ]);
  ?>

  <br>
  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['/admin/products/view', 'id' => $product_id], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
