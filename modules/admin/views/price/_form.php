<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Price */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-form">

  <?php $form = ActiveForm::begin(); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
  </div>

  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'price')->textInput() ?>

  <?php ActiveForm::end(); ?>

</div>
