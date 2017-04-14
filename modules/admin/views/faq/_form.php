<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Faq */
/* @var $requestId integer */
/* @var $productName string */
?>

<h3>Данный выпадающий блок относится к продукции - <?= $productName ?></h3>
<br>

<div class="faq-form">
  <?php $form = ActiveForm::begin(); ?>

  <?php
  if ($requestId !== null){
    // Если полученный параметр requestId не равен null, значит продукция в dropDownList будет выбрана по умолчанию по id
    $form->field($model, 'product_id')->textInput(['value' => $requestId]);
  } else {
    // Иначе, если не был передан id продукции, тогда будет предоставлен выбор из списка вручную
    echo $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Products::find()->all(), 'id', 'name'), [
      'prompt' => 'Выберите продукцию'
    ]);
  }
  ?>

  <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'text')->widget(CKEditor::className(),
    [
      'editorOptions' =>
        [
          'preset' => 'mini',
          'inline' => false,
        ],
    ]);
  ?>

  <div class="form-group">
    <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-primary">Вернуться назад без сохранения</a>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
