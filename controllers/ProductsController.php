<?php

namespace app\controllers;
use app\models\Faq;
use app\models\Products;
use yii\web\HttpException;

class ProductsController extends AppController
{
  public function actionIndex()
  {
    // Подключаемся к базе данных и определяем кол-во записей
    $idCount = $this->myFullOfProductsCount();
    
    // Принимаем параметр $_GET['id'] и заносим в переменную.
    $product_id = \Yii::$app->request->get('id');

    // Если $product_id не пустой и если он не превышает количества записей в базе данных
    if (!empty($product_id) && $product_id<=$idCount)
    {
      //Снова подключаемся к БД и получаем объект с записями по id продукции, полученному из $_GET['id'] и передаем в вид
      $oneProduct = Products::findOne($product_id);
      $faqTriggers = Faq::find()->where('product_id = '.$product_id)->all();
      return $this->render('index', compact('oneProduct', 'idCount', 'product_id', 'faqTriggers'));
    }

    // При условии, что $id пуст и запрос был к пустой индесной странице - то пользователь будет переправлен на Продукцию 1
    elseif($_SERVER['REQUEST_URI'] == '/products/index' || $_SERVER['REQUEST_URI'] == '/products/')
    {
      return \Yii::$app->response->redirect(['/products/index', 'id' => 1]);
    }

    // Иначе приложение выдаст 404 ошибку
    else
    {
      throw new HttpException(404);
    }
  }
}
