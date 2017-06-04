<?php

namespace app\modules\admin\models;

use Yii;
use app\controllers\AppController;
use yii\helpers\Html;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $title
 * @property string $text
 * @property string $image
 *
 * @property Products $product
 */
class Faq extends \yii\db\ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'faq';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['title', 'text'], 'required'],
      [['product_id'], 'integer'],
      ['product_id', 'required', 'message' => 'Вам необходимо выбрать продукцию из списка'],
      [['text'], 'string'],
      [['title'], 'string', 'max' => 64],
      [['image'], 'string', 'max' => 155],
      [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'product_id' => 'Продукция',
      'title' => 'Заголовок блока',
      'text' => 'Текст блока',
      'image' => 'Картинка'
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getProduct()
  {
    return $this->hasOne(Products::className(), ['id' => 'product_id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   * @var $product_id integer
   */
  static public function getFaq($product_id)
  {
    return self::find()->where('product_id = '.$product_id)->all();
  }

  static public function getFaqCount($product_id)
  {
    return self::find()->where('product_id = '.$product_id)->count();
  }

  static public function getFaqBlocks($product_id)
  {
    $array = $product_id ? Faq::getFaq($product_id) : null;
    if ($array) {
      $i = 1;
      $allBlocks = '<div class="faq-questions">';
      foreach ($array as $item)
      {
        $imageName = $item->image;

        $allBlocks .= '<h4 class="trigger"><a href="#q'.$i.'">'.$item->title.'</a></h4>';
        $allBlocks .= '<div id="q'.$i.'" class="toggle_container">';
        $allBlocks .= '<img src="'.AppController::ifImageExists($imageName, UploadForm::TYPE_FAQ).'">';
        $allBlocks .= $item->text;
        $allBlocks .= '<br style="clear: both; margin: 5px 0;"><hr>';
        $allBlocks .= Html::a('Редактировать', ['/admin/faq/update', 'id' => $item->id], ['class' => 'btn btn-info']);
        $allBlocks .= '</div>';
        $i++;
      }
      $allBlocks .= '</div><br>';
      $allBlocks .= Html::a('Добавить новый', ['/admin/faq/create', 'product_id' => $product_id], ['class' => 'btn btn-success']);
      $allBlocks .= '<br><br>';
    } else {
      $allBlocks  = '<label>Выпадающие блоки еще не были созданы</label>&nbsp;&nbsp;';
      $allBlocks .= Html::a('Добавить новый', ['/admin/faq/create', 'product_id' => $product_id], ['class' => 'btn btn-success']);
      $allBlocks .= '<br><br>';
    }
    return $allBlocks;
  }

}
