<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Замена картинки';
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gallery-form ">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <div class="form-group">
    <?= Html::a('Вернуться назад без сохранения новой картинки', ['view', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>

    <br><br>
    <?= '<h3>Название сохранено успешно!</h3><br><h5>Теперь вы можете добавить новое изображение, нажав на кнопку:</h5>'; ?>
    <br>
    <?= $form->field($file, 'imageFile')->fileInput() ?>
    <br>
    <?= Html::submitButton('Сохранить выбранную картинку', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>