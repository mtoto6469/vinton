<?php
/**
 * Created by PhpStorm.
 * User: hadise
 * Date: 4/28/2018
 * Time: 10:32 PM
 */

namespace frontend\assets;
use yii\web\AssetBundle;

class AppAssetLogin extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        "css/sb-admin-11.css"
  ];
   public $js = [

         "js/login.js"

  ];
public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
];
}