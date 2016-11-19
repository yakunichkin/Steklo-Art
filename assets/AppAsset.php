<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/bootstrap.css',
    'css/bootstrap-responsive.css',
    'css/style.css',
    'css/colors.css',
    'js/prettyphoto/css/prettyPhoto.css',
  ];
  public $js = [
    'js/jquery.min.js',
    'js/jquery-ui.min.js',
    'js/menu.js',
    'js/jquery.flexslider.min.js',
    'js/jquery.easing.min.js',
    'js/prettyphoto/js/jquery.prettyPhoto.js',
    'js/init.js',
    'js/jquery.form.js',
    'js/contactform.js',
  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
  ];
}
