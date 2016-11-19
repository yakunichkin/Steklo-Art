<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

  <?php $form = ActiveForm::begin(); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
  </div>

  <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'phone_1')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'phone_2')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'phone_3')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
  </div>
  <br>
  <?php ActiveForm::end(); ?>

</div>
