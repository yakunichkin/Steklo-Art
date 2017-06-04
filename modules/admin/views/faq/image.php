<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Products;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */

if ($product_id !== null) {
  $productName = Products::getProductName($product_id);
} else $productName = null;

$this->title = 'Добавление картинки';
$this->params['breadcrumbs'][] = ['label' => 'Выпадающие блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = [
  'label' => 'Продукт №'.$model->product_id .': '. $productName,
  'url' => ['/admin/products/update', 'id' => $model->product_id]
];
$this->params['breadcrumbs'][] = ['label' => 'Выпадающий блок: '. $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gallery-form ">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <div class="form-group">
    <?= Html::a('Вернуться без сохранения', ['view', 'id' => $model->id ], ['class' => 'btn btn-primary']) ?>

    <br><br>
    <?= '<h3>Название сохранено успешно!</h3><br><h5>Теперь вы можете добавить новое изображение:</h5>'; ?>
    <br>
    <?= $form->field($file, 'imageFile')->fileInput() ?>
    <br>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>