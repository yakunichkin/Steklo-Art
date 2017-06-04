<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Index */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="index-form">

  <?php $form = ActiveForm::begin(); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения', ['index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-success']) ?>

    <br><br>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'text')->widget(CKEditor::className(),
      [
        'editorOptions' =>
          [
            'preset' => 'standart',
            'inline' => false,
          ],
      ]);
    ?>
  </div>

    <?php ActiveForm::end(); ?>

  </div>
