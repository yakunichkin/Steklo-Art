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
      // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
      'cookieValidationKey' => 'cVoBkLz00ozDYAKyDCRq4_itQwaEFIJ4',
      'baseUrl' => '',  // Настройка, необходима для того, чтобы не отображалась папка Web в адресной строке
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
      // send all mails to a file by default. You have to set
      // 'useFileTransport' to false and configure a transport
      // for the mailer to send real emails.
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
//          'admin/index' => 'admin/index/index',
//          'admin/products' => 'admin/products/index',
//          'admin/services' => 'admin/services/index',
//          'admin/gallery' => 'admin/gallery/index',
//          'admin/price' => 'admin/price/index',
//          'admin/contacts' => 'admin/contacts/index',
          'admin' => 'admin/default/index',
          '<action>' => 'site/<action>',
          'products/<id\d+>' => 'products/index',

        ],
    ],

  ],
  'params' => $params,
];

if (YII_ENV_DEV) {
  // configuration adjustments for 'dev' environment

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
