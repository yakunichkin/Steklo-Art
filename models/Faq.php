<?php

namespace app\models;

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
      [['product_id', 'title', 'text'], 'required'],
      [['product_id'], 'integer'],
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
      'product_id' => 'Product ID',
      'title' => 'Title',
      'text' => 'Text',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getProduct()
  {
    return $this->hasOne(Products::className(), ['id' => 'product_id']);
  }
}
