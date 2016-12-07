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
  <p>Пожалуйста, заполните следующие поля для того, чтобы вы могли войти в панель Редактора:</p>
  <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <?= Html::submitButton('Войти в Панель для Редактирования', ['class' => 'btn btn-primary']) ?>

  <?php ActiveForm::end(); ?>

