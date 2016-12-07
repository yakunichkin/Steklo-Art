<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Gallery;
//use yii\base\ErrorException;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
//use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\modules\admin\models\UploadForm;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends BehaviorsController
{
  public function imagePreview($model)
  {
    if(!empty($model->image))
    {
      echo
        '<h4>Предпросмотр изображения</h4><br>' .
        '<img src="../../images/gallery/'. $model->image .'" width="240" height="135">';
    }
    else
    {
      echo
        '<h4>Изображение отсутствует</h4><br>' .
        '<img src="../../images/gallery/no-image.jpg" width="240" height="135">';
    }
  }

  public function myGetGalleryCount()
  {
    $model = new Gallery();
    return $model->find()->count('id');
  }
//  /**
//   * @inheritdoc
//   */
//  public function behaviors()
//  {
//    return [
//      'verbs' => [
//        'class' => VerbFilter::className(),
//        'actions' => [
//          'delete' => ['POST'],
//        ],
//      ],
//    ];
//  }

  /**
   * Lists all Gallery models.
   * @return mixed
   */
  public function actionIndex()
  {
    $dataProvider = new ActiveDataProvider([
      'query' => Gallery::find(),
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Gallery model.
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
   * Creates a new Gallery model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()
  {
    $model = new Gallery();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {

      return $this->redirect(['image', 'id' => $model->id]);
    } else {
      return $this->render('create', [
        'model' => $model,
      ]);
    }
  }

  /**
   * Updates an existing Gallery model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {

      return $this->redirect(['image', 'id' => $model->id]);
    } else {
      return $this->render('update', [
        'model' => $model,
      ]);
    }
  }

  public function actionImage($id)
  {
    $file = new UploadForm();
    $model = $this->findModel($id);

    $file->imageFile = UploadedFile::getInstance($file, 'imageFile');
    if (Yii::$app->request->isPost) {
      if ($file->upload($id)) {
        $model->image = $file->myGetNameImage($id);
        $model->save();
        return $this->redirect(['view', 'id' => $id]);
      }
      else
      {
        return $this->redirect(['view', 'id' => $id]);
      }
    }
    else {
      return $this->render('image', compact('file', 'model'));
    }
  }

  /**
   * Deletes an existing Gallery model.
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
   * Finds the Gallery model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Gallery the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = Gallery::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }
}
