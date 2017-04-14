<?php

namespace app\modules\admin\models;

use yii;
use yii\db\ActiveRecord;

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
      [['name', 'text', 'main_img', 'img_1', 'img_2', 'img_3'], 'filter', 'filter'=>'trim']

    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'Номер',
      'name' => 'Название',
      'text' => 'Текст',
      'main_img' => 'Основное фото',
      'img_1' => 'Доп. фото 1',
      'img_2' => 'Доп. фото 2',
      'img_3' => 'Доп. фото 3',
    ];
  }

  static public function getProductName($id)
  {
   $product = self::find()->where('id = '.$id)->one();
   return $product->name;
  }
}
