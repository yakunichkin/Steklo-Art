<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form ">

  <?php $form = ActiveForm::begin(); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-success']) ?>

    <br><br>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?// $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    <?// Html::a($model->isNewRecord ? 'Добавить картинку' : 'Обновить картинку', $model->isNewRecord ? ['create-image'] : ['update-image', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    <br>
    
    <?= $this->context->imagePreview($model); ?>

  </div>

  <?php ActiveForm::end(); ?>

</div>
