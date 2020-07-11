<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/23/2018
 * Time: 2:35 AM
 */

namespace backend\assets;
use yii\web\AssetBundle;



class AppAssetMain2 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',


        "css/bootstrap.min.css",

        "css/plugins/metisMenu/metisMenu.min.css" ,

        "css/plugins/timeline.css",

        "css/sb-admin-2.css",

        "css/datepicker.css",

        "css/plugins/morris.css",

        "css/font-awesome/font-awesome.min.css",

        "fonts/font.css",




    ];
    public $js = [




        "js/bootstrap.min.js",
        "js/js-phone.js",



        "js/metisMenu/metisMenu.min.js",

        "js/raphael/raphael.min.js",
        "js/morris/morris.min.js",

//        "js/sb-admin-2.js",

        "js/bootstrap-datepicker.min.js",
        "js/bootstrap-datepicker.fa.min.js",





        "js/datepicker.js",

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
