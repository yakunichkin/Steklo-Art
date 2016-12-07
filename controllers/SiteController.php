<?php

namespace app\controllers;

use app\models\Index;
use app\models\Services;
use app\models\Price;
use app\models\Gallery;
use app\models\Slider;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends AppController
{

/*
 * Behaviors
 */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout'],
        'rules' => [
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post', 'get'],
        ],
      ],
    ];
  }

/*
 * Actions
 */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  /*
   * Контент, отображаемый на сайте записан в Базе данных "pro_stm" его можно менять в админке,
   * Для этого модель и контроллер админ панели находится в Модуле - app/modules/admin/
   */

  /*
   * Стартовая страница Index
   * На этой странице отображается слайдер, который берет контент из таблицы Slider
   * Далее весь остальной контент используется из таблицы Index
   */
  public function actionIndex()
  {
    $allSlider = Slider::find()->select('id, title')->all();
    $allIndex = Index::find()->select('id, title, text')->all();

    return $this->render('index', compact('allSlider', 'allIndex'));
  }

  /*
   * Раздел Продукция
   */
  //-- Раздел с продукцией генерируется отдельным контроллером ProductsController --

  /*
   * Раздел Услуги
   * Информация для этой страницы полностью заполняется из таблицы Services в БД
   */
  public function actionServices()
  {
    $allServices = Services::find()->select('id, name, text')->all();

    return $this->render('services', compact('allServices'));
  }

  /*
   * Раздел Галерея
   * В этом разделе отображаются фотографии из таблицы Gallery
   * Эти фото админ сайта может добавлять/изменять в админ панеле благодаря CRUD по адресу - /admin/gallery
   * Модель и контроллер админ панели находится в Модуле - app/modules/admin/
   */
  public function actionGallery()
  {
    $allGallery = Gallery::find()->select('id, title, image')->all();

    return $this->render('gallery', compact('allGallery'));
  }

  /*
   * Раздел Прайс-лист
   * Список стоимости продукции из таблицы Prices
   */
  public function actionPrices()
  {
    $allPrices = Price::find()->select('id, name, price')->all();

    return $this->render('prices', compact('allPrices'));
  }

  /*
   * Раздел Контакты
   * Подключение к базе данных и заполнение контактными данными производится в родительском контроллере AppController
   * Для этого используется метод myGetContacts(), этот метот проверяет и выводит только заполненные значения
   */
  public function actionContact()
  {
    return $this->render('contact');
  }

  /*
   * Авторизация пользователей
   */
  public function actionLogin()
  {
    if (!\Yii::$app->user->isGuest) {
      return \Yii::$app->response->redirect(['/admin']);
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return \Yii::$app->response->redirect(['/admin']);
    }
    return $this->render('login', [
      'model' => $model,
    ]);
  }

  /*
   * Выйти из личного кабинета
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->goHome();
  }
}
