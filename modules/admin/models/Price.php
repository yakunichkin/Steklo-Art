<?php

namespace app\modules\admin\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 */
class Price extends ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'price';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['name', 'price'], 'required'],
      [['price'], 'integer'],
      [['name'], 'string', 'max' => 155],
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'Номер',
      'name' => 'Наименование',
      'price' => 'Стоимость',
    ];
  }
}
