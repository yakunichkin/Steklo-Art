<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $title
 * @property string $text
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
}
