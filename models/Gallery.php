<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;


/**
 * This is the model class for table "gallery".
 * @property integer $id
 * @property string $title
 */
class Gallery extends ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'gallery';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['title'], 'required'],
      [['title'], 'string', 'max' => 100],
      [['image'], 'string', 'max' => 255],
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'title' => 'Заголовок',
      'image' => 'Изображение',
    ];
  }
}
