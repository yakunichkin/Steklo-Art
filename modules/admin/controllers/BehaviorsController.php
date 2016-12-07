<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class BehaviorsController extends Controller
{

//  public function beforeAction($action)
//  {
//    if (\Yii::$app->user->isGuest)
//    {
//      return \Yii::$app->response->redirect(['/login']);
//    }
//  }
  public function behaviors()
  {
    return
      [
        'access' =>
          [
            'class' => AccessControl::className(),
            'only' => ['index', 'create', 'view', 'update', 'image'],
            /*
            'denyCallback' => function($rule, $action)
            {
              throw new \Exception('Нет доступа.');   // В случае запрета доступа, вызывается исключение
            },
            */
            'rules' =>
              [
                [
                  'allow' => true,
                  'actions' => ['index', 'create', 'view', 'update', 'image'],
                  'roles' => ['@']
                ],
              ]
          ],
        'verbs' => [
          'class' => VerbFilter::className(),
          'actions' => [
            'delete' => ['POST'],
          ],
        ],
      ];
  }
}