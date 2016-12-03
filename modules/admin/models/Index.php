<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "index".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 */
class Index extends \yii\db\ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'index';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['title', 'text'], 'required'],
      [['text'], 'string'],
      [['title'], 'string', 'max' => 100],
      [['title', 'text'], 'filter', 'filter'=>'trim']
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'Номер',
      'title' => 'Название',
      'text' => 'Текст',
    ];
  }
}
