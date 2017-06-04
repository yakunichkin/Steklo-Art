<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Products;
use Yii;
use app\modules\admin\models\Faq;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\modules\admin\models\UploadForm;

/**
 * FaqController implements the CRUD actions for Faq model.
 */
class FaqController extends Controller
{
  /**
   * @inheritdoc
   */
  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
        ],
      ],
    ];
  }

  /**
   * Lists all Faq models.
   * @return mixed
   */
  public function actionIndex()
  {
    $dataProvider = new ActiveDataProvider([
      'query' => Faq::find(),
    ]);

    return $this->render('index', [
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Creates a new Faq model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   * @var $product_id integer
   */
  public function actionCreate($product_id)
  {
    $model = new Faq();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['image', 'id' => $model->id, 'product_id' => $product_id]);
    } else {
      return $this->render('create', [
        'model' => $model,
        'product_id' => $product_id,
      ]);
    }
  }

  /**
   * Displays a single Faq model.
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
   * Updates an existing Faq model.
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
      return $this->render('update', [
        'model' => $model,
      ]);
    }
  }

  public function actionImage($id, $product_id)
  {
    $file = new UploadForm();
    $model = $this->findModel($id);

    $file->imageFile = UploadedFile::getInstance($file, 'imageFile');
    if ($model->load(Yii::$app->request->post())) {
      if ($file->upload($product_id, $id, $file::TYPE_FAQ)) {
        $model->image = $file->getNameImage($product_id, $id, $file::TYPE_FAQ);
        $model->save();
        return $this->redirect(['view', 'id' => $id]);
      }
      else
      {
        $model->image = null;
        $model->save();
        return $this->redirect(['update', 'id' => $id, 'product_id' => $product_id]);
      }
    }
    else {
      return $this->render('image', compact('file', 'model', 'product_id'));
    }
  }

  /**
   * Deletes an existing Faq model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @param integer $product_id
   * @return mixed
   */
  public function actionDelete($id, $product_id)
  {
    $this->findModel($id)->delete();

    if ($product_id)
    {
      return $this->redirect(['/admin/products/update', 'id' => $product_id]);
    } else {
      return $this->redirect(['/admin/products/']);
    }
  }

  /**
   * Finds the Faq model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Faq the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = Faq::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }
}
