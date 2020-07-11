<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [


        'css/style.css',
        'css/sb-admin-11.css',
        'css/sb-admin-21.css',
        "css/jquery.virtualKeyboard.css",
        "fonts/fontt/font.css",

      "css/bootstrap.min.css",
      "css/my-css/bootstrap-rtl.min.css",
      



//"//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css",


  'css/font-awesome/font-awesome.min.css',




    ];
    public $js = [




       "js/my-js/bootstrap.min.js",
//       "js/datepicker.js",

        "js/jquery-1.11.2.js",
        "js/jquery.virtualKeyboard.js",

     "js/sb-admin-2.js",
        "js/js1.js",


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
