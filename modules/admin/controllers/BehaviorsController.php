<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class BehaviorsController extends Controller
{

  /*
   * Родительский контроллер, который с помощью поведений Behaviors запрещает доступ неавторизованным пользователям
   */

  public function behaviors()
  {
    return
      [
        'access' =>
          [
            'class' => AccessControl::className(),
            'only' => ['index', 'create', 'view', 'update', 'image'],
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