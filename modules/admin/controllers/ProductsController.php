<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\modules\admin\models\UploadForm;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends BehaviorsController
{

  /**
   * Lists all Products models.
   * @return mixed
   */
  public function actionIndex()
  {
    $dataProvider = new ActiveDataProvider([
      'query' => Products::find(),
    ]);

    return $this->render('index', compact('dataProvider'));
  }

  /**
   * Displays a single Products model.
   * @param integer $id
   * @return mixed
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  /**
   * Creates a new Products model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()
  {
    $model = new Products();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {

      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('create', compact('model'));
    }
  }

  /**
   * Updates an existing Products model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {

      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('update', compact('model'));
    }
  }

  public function actionImage($id, $number)
  {
    $file = new UploadForm();
    $model = $this->findModel($id);

    if (Yii::$app->request->isPost) {
      $file->imageFile = UploadedFile::getInstance($file, 'imageFile');

      switch ($number) {
        case $file::NUMBER_MAIN:
          $fileName = $file->getNameImage($id, $file::NUMBER_MAIN, $file::TYPE_PRODUCT);
          if ($file->upload($id, $file::NUMBER_MAIN, $file::TYPE_PRODUCT)) {
            $model->main_img = $fileName;
          } else {
            $model->main_img = null;
          }
          $model->save();
          break;
        case $file::NUMBER_1:
          $fileName = $file->getNameImage($id, $file::NUMBER_1, $file::TYPE_PRODUCT);
          if ($file->upload($id, $file::NUMBER_1, $file::TYPE_PRODUCT)) {
            $model->img_1 = $fileName;
          } else {
            $model->img_1 = null;
          }
          $model->save();
          break;
        case $file::NUMBER_2:
          $fileName = $file->getNameImage($id, $file::NUMBER_2, $file::TYPE_PRODUCT);
          if ($file->upload($id, $file::NUMBER_2, $file::TYPE_PRODUCT)) {
            $model->img_2 = $fileName;
          } else {
            $model->img_2 = null;
          }
          $model->save();
          break;
        case $file::NUMBER_3:
          $fileName = $file->getNameImage($id, $file::NUMBER_3, $file::TYPE_PRODUCT);
          if ($file->upload($id, $file::NUMBER_3, $file::TYPE_PRODUCT)) {
            $model->img_3 = $fileName;
          } else {
            $model->img_3 = null;
          }
          $model->save();
          break;
        default:
          break;
      }

      return $this->redirect(['view', 'id' => $id]);
    }

    else {
      return $this->render('image', compact('file', 'model'));
    }
  }

  /**
   * Deletes an existing Products model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the Products model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Products the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = Products::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }
}
