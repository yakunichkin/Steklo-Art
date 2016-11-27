<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form ">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>

    <br><br>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?// $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    <?// Html::a($model->isNewRecord ? 'Добавить картинку' : 'Обновить картинку', $model->isNewRecord ? ['create-image'] : ['update-image', 'id' => $model->id], ['class' => 'btn btn-info']) ?>

    <?php

    if (!$model->isNewRecord)
    {
      $this->context->imagePreview($model);
      echo '<br><br>';
      echo '<h5>Для того, чтобы заменить текущее название и выбрать другую картинку - нажмите кнопку:</h5>';
      echo '<br>';
      echo Html::submitButton('Сохранить новое название и заменить картинку', ['class' => 'btn btn-info']);
    }     
    else
    {
      echo '<h4>Изображение пока отсутствует.</h4><h5>Введите название и нажмите кнопку:</h5>';
      echo '<br>';
      echo Html::submitButton('Сохранить название и добавить картинку', ['class' => 'btn btn-info']);
    }

    ?>

  </div>

  <?php ActiveForm::end(); ?>

</div>
