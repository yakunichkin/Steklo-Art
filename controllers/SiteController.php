<?php

namespace app\controllers;


use app\models\Contacts;
use app\models\Index;
use app\models\Services;
use app\models\WhyWe;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Price;
use app\models\Gallery;
use app\models\Advantage;
use app\models\Slider;
use app\models\OurProducts;

class SiteController extends AppController
{

  /*
   * Behaviors and Actions
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
          'logout' => ['post'],
        ],
      ],
    ];
  }

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
   * Стартовая страница
   */
  public function actionIndex()
  {
    $allSlider = Slider::find()->select('id, title')->all();
    $allIndex = Index::find()->select('id, title, text')->all();

    return $this->render('index', compact('allSlider', 'allIndex'));
  }

  /*
   * Прайс-лист
   */
  public function actionPrices()
  {
    //Подключение к базе данных
    $allPrices = Price::find()->select('id, name, price')->all();

    return $this->render('prices', compact('allPrices'));
  }

  /*
   * Галерея
   */
  public function actionGallery()
  {
    //Подключение к базе данных
    $allGallery = Gallery::find()->select('id, title, image')->all();

    return $this->render('gallery', compact('allGallery'));
  }

  /*
   * Услуги
   */
  public function actionServices()
  {
    //Подключение к базе данных
    $allServices = Services::find()->select('id, name, text')->all();

    return $this->render('services', compact('allServices'));
  }

  /*
   * Контакты
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
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }
    return $this->render('login', compact('$model'));
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
