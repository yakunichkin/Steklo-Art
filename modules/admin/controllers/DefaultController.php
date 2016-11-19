<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\UploadForm;
use app\controllers\AppController;
use yii\web\UploadedFile;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppController
{
  /**
   * Renders the index view for the module
   * @return string
   */
  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionUpload()
  {
    $model = new UploadForm();

    if (Yii::$app->request->isPost) {
      $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
      if ($model->upload()) {
        // file is uploaded successfully
        return;
      }
    }

    return $this->render('upload', ['model' => $model]);
  }
}