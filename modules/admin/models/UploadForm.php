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
  public $id = 10;

  public function rules()
  {
    return [
      [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png'],
    ];
  }

  public function upload()
  {
    if ($this->validate()) {
      $this->imageFile->saveAs('../web/images/gallery/gal-' . $this->id . '.' . $this->imageFile->extension);
      return true;
    } else {
      return false;
    }
  }
}