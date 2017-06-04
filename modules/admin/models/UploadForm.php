<?php
namespace app\modules\admin\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
  /**
   * @var UploadedFile
   */
  public $imageFile;

  const TYPE_PRODUCT = 'products';
  const TYPE_FAQ = 'faq';
  const TYPE_GALLERY = 'gallery';
  const NUMBER_MAIN = 1;
  const NUMBER_1 = 2;
  const NUMBER_2 = 3;
  const NUMBER_3 = 4;

  public function rules()
  {
    return [
      [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => false, 'skipOnError' => false, 'maxSize' => 5242880, 'tooBig' => 'Размер не больше 5 Мб', 'message' => 'Допустимые расширения (.png, .jpg, .jpeg) и размер до 5 Мб'],
    ];
  }

  public function upload($id, $number, $type)
  {
    switch ($type){
      case self::TYPE_PRODUCT:
        $folder = self::TYPE_PRODUCT;
        break;
      case self::TYPE_FAQ:
        $folder = self::TYPE_FAQ;
        break;
      case self::TYPE_GALLERY:
        $folder = self::TYPE_GALLERY;
        break;
      default:
        return null;
    }

    $path = '../web/images/'. $folder .'/'. $this->getNameImage($id, $number, $type);

    if ($this->validate()) {
      $this->imageFile->saveAs($path);
      return true;
    } else {
      return false;
    }
  }

  public function getNameImage($id, $number, $type)
  {
    switch ($type){
      case self::TYPE_PRODUCT:
        return 'prod-img-'. $id . '-'. $number . '.' . $this->imageFile->extension;
        break;
      case self::TYPE_FAQ:
        return 'faq-img-'. $id . '-'. $number . '.' . $this->imageFile->extension;
        break;
      case self::TYPE_GALLERY:
        return 'gal-'. $id . '.' . $this->imageFile->extension;
      break;
      default:
        return null;
    }
  }

  public function attributeLabels()
  {
    return [
      'imageFile' => '',
    ];
  }
  
}