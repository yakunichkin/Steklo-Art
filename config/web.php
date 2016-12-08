<?php

$params = require(__DIR__ . '/params.php');

$config = [
  'id' => 'basic',
  'name' => 'Steklo-Art',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'language' => 'ru_RU',
  'charset' => 'UTF-8',
  'defaultRoute' => 'site/index',
  'modules' => [
    'admin' => [
      'class' => 'app\modules\admin\Module',
      'defaultRoute' => 'default/index',
      'layout' => 'admin_layout',
    ],
  ],
  'components' => [
    'request' => [
      'cookieValidationKey' => 'cVoBkLz00ozDYAKyDCRq4_itQwaEFIJ4',
      'baseUrl' => '',  // Убирает "/web/" в адресной строке
    ],
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'user' => [
      'identityClass' => 'app\models\User',
      'enableAutoLogin' => true,
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'mailer' => [
      'class' => 'yii\swiftmailer\Mailer',
      'useFileTransport' => true,
    ],
    'log' => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets' => [
        [
          'class' => 'yii\log\FileTarget',
          'levels' => ['error', 'warning'],
        ],
      ],
    ],
    'db' => require(__DIR__ . '/db.php'),

    'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' =>
        [
          'admin/<controller>' => 'admin/<controller>/index',
          'admin' => 'admin/default/index',
          '<action>' => 'site/<action>',
          'products/<id\d+>' => 'products/index',

        ],
    ],

  ],
  'params' => $params,
];

if (YII_ENV_DEV) {

  $config['bootstrap'][] = 'debug';
  $config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
  ];
  
  $config['bootstrap'][] = 'gii';
  $config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
  ];

}

return $config;
