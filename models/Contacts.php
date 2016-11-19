<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address' => 'Address',
            'phone_1' => 'Phone 1',
            'phone_2' => 'Phone 2',
            'phone_3' => 'Phone 3',
            'email' => 'Email',
            'skype' => 'Skype',
        ];
    }
}
