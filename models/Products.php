<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $main_img
 * @property string $img_1
 * @property string $img_2
 * @property string $img_3
 * @property string $faq_trigger
 */
class Products extends ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'products';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['name', 'text', 'main_img'], 'required'],
      [['text'], 'string'],
      [['name'], 'string', 'max' => 155],
      [['main_img', 'img_1', 'img_2', 'img_3'], 'string', 'max' => 50],
      [['faq_trigger'], 'string'],
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'name' => 'Name',
      'text' => 'Text',
      'main_img' => 'Main Img',
      'img_1' => 'Img 1',
      'img_2' => 'Img 2',
      'img_3' => 'Img 3',
      'faq_trigger' => 'Trigger',
    ];
  }
}
