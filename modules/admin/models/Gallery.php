<?php

namespace app\modules\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
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
      [['title', 'image'], 'filter', 'filter'=>'trim'],
      [['image'], 'default', 'value' => null]
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'Номер',
      'title' => 'Заголовок',
      'image' => 'Изображение',
    ];
  }

  public function imageGalleryPreview($width = 240, $height = 135, $alt = "image")
  {
    $text = 'Изображение отсутствует';
    $returnImage = 'no-image.jpg';

    if ($this->image) {
      if (file_exists('./images/gallery/'.$this->image)) {
        $text = 'Предпросмотр изображения:';
        $returnImage = 'gallery/'.$this->image;
      }
    }

    $preview  = '<h4>'. $text .'</h4><br>';
    $preview .= '<img src="/images/'. $returnImage .'" width="'.$width.'" height="'.$height.'" alt="'. $alt .'">';

    return $preview;
  }
}
