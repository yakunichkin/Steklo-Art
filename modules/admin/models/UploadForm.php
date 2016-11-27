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

  public function rules()
  {
    return [
      [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif'],
    ];
  }

  public function upload($id)
  {
    if ($this->validate()) {
      $this->imageFile->saveAs('../web/images/gallery/gal-' . $id . '.' . $this->imageFile->extension);
      return true;
    } else {
      return false;
    }
  }

  public function getNameImage($id)
  {
    return 'gal-'. $id . '.' . $this->imageFile->extension;
  }

  public function attributeLabels()
  {
    return [
      'imageFile' => ''
    ];
  }
  
}