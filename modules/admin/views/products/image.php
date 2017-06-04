<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Добавление картинки';
$this->params['breadcrumbs'][] = ['label' => 'Картинка продукта', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gallery-form ">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <div class="form-group">
    <?= Html::a('Вернуться без сохранения', ['view', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>

    <br><br>
    <?= '<h5>Выберете новое изображение</h5>'; ?>
    <br>
    <?= $form->field($file, 'imageFile')->fileInput() ?>
    <br>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>