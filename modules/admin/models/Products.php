<?php

namespace app\modules\admin\models;

use yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\Html;
use app\controllers\AppController;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $main_img
 * @property string $img_1
 * @property string $img_2
 * @property string $img_3
 */
class Products extends ActiveRecord
{
  const NUMBER_MAIN = 1;
  const NUMBER_1 = 2;
  const NUMBER_2 = 3;
  const NUMBER_3 = 4;

  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'products';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
      [['name', 'text'], 'required'],
      [['text'], 'string'],
      [['name'], 'string', 'max' => 155],
      [['main_img', 'img_1', 'img_2', 'img_3'], 'string', 'max' => 50],
      [['name', 'text', 'main_img', 'img_1', 'img_2', 'img_3'], 'filter', 'filter'=>'trim']

    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels()
  {
    return [
      'id' => 'Номер',
      'name' => 'Название',
      'text' => 'Текст',
      'main_img' => 'Основное фото',
      'img_1' => 'Доп. фото 1',
      'img_2' => 'Доп. фото 2',
      'img_3' => 'Доп. фото 3',
    ];
  }

  static public function getProductName($id)
  {
   $product = self::find()->where('id = '.$id)->one();
   return $product->name;
  }

  public function imageProductPreview($buttonCheck = null, $number, $width = 150, $height = 84, $alt = "image")
  {
    switch ($number) {
      case self::NUMBER_MAIN:
        $image = $this->main_img;
        break;
      case self::NUMBER_1:
        $image = $this->img_1;
        break;
      case self::NUMBER_2:
        $image = $this->img_2;
        break;
      case self::NUMBER_3:
        $image = $this->img_3;
        break;
      default:
        $image = null;
        break;
    }

    $returnImage = 'no-image.jpg';
    $buttonName = 'Добавить';
    $buttonClass = 'btn-success';

    if ($image) {
      if (file_exists('./images/products/' . $image)) {
        $returnImage = 'products/' . $image;
        $buttonName = 'Заменить';
        $buttonClass = 'btn-info';
      }
    }
    $url = Url::to(['/admin/products/image', 'id' => $this->id, 'number' => $number]);

    $preview = '<img src="/images/' . $returnImage . '" width="'.$width.'" height="'.$height.'" alt="'.$alt.'">';
    if ($buttonCheck !== null){
      $preview .= '&nbsp;&nbsp;<a href="' . $url . '" class="btn ' . $buttonClass . '">' . $buttonName . '</a>';
    }
    return $preview;
  }
}
