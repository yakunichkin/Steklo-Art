<?php

namespace app\modules\admin\models;

use Yii;

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
class Products extends \yii\db\ActiveRecord
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
      [['text', 'faq_trigger'], 'string'],
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
      'main_img' => 'Картинка возле описания',
      'img_1' => 'Картинка внизу 1',
      'img_2' => 'Картинка внизу 2',
      'img_3' => 'Картинка внизу 3',
      'faq_trigger' => 'Выпадающие меню',
    ];
  }
}
