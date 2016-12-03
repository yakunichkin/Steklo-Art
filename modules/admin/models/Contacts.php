<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property integer $id
 * @property string $address
 * @property string $phone_1
 * @property string $phone_2
 * @property string $phone_3
 * @property string $email
 * @property string $skype
 */
class Contacts extends \yii\db\ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'contacts';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['address'], 'string', 'max' => 155],
      [['phone_1', 'phone_2', 'phone_3'], 'string', 'max' => 25],
      [['email', 'skype'], 'string', 'max' => 100],
      [['address', 'phone_1', 'phone_2', 'phone_3', 'email', 'skype'], 'filter', 'filter'=>'trim']
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'address' => 'Адрес',
      'phone_1' => 'Телефон 1',
      'phone_2' => 'Телефон 2',
      'phone_3' => 'Телефон 3',
      'email' => 'Email',
      'skype' => 'Skype',
    ];
  }
}
