<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form col-lg-6">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>

    <br><br>

    <?php
      if (!$model->isNewRecord && $model->image != null)
      {
        echo $model->imageGalleryPreview();
        echo '<br><br><h4>Вы можете заменить это изображение:</h4>';
      }
      else
      {
        echo '<h4>Изображение пока отсутствует. Вы можете добавить его:</h4>';
      }
    ?>
    <br>
    <?= $form->field($file, 'imageFile')->fileInput(); ?>
    <hr>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <br>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>


  </div>

  <?php ActiveForm::end(); ?>

</div>
