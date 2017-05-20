<?php

/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/3/21
 * Time: 下午5:55
 */
namespace app\install\assets;
class InstallAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@app/install/source';
    public $css = [
//        "AdminLTE.min.css",
//        "_all-skins.min.css",
//        "skin-blue.css",
//        'admin.css',
          'css/install.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/validate.js',
        'js/ajaxForm.js',
        
    ];
    public $depends = [
//        'yii\web\JqueryAsset',
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
//        'hass\backend\assets\FontAwesomeAsset',
//        'hass\backend\assets\IoniconsAsset',
//        'hass\backend\assets\AdminLteAsset',
    ];
}