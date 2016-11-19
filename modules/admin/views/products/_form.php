<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

  <?php $form = ActiveForm::begin(); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
  </div>

  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'text')->textarea(['rows' => 8]) ?>

  <?= $form->field($model, 'main_img')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'img_1')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'img_2')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'img_3')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'faq_trigger')->textarea(['rows' => 6]) ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
