<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
?>
  <h1><?= Html::encode($this->title) ?></h1>
  <br>
  <p>Пожалуйста, заполните поля для входа в панель Редактора:</p>
  <div class="row">
    <div class="span3">
    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
      <?= $form->field($model, 'password')->passwordInput() ?>
      <?//= $form->field($model, 'rememberMe')->checkbox() ?>

      <?= Html::submitButton('Авторизоваться', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
    </div>
  </div>