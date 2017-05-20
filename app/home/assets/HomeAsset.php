<?php
namespace app\home\assets;

use yii\base\Exception;
use yii\web\AssetBundle;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class HomeAsset extends AssetBundle
{
    public $sourcePath = '@app/home/misc';
    public $css = [
        'css/style.css',
        'css/remodal.css',
        'css/remodal-default-theme.css',
        'css/main.css',

    ];
    public $js = [
        'js/jquery.js',
        'js/remodal.min.js',
        'js/main.js',




    ];
    public $depends = [
//        'yii\web\JqueryAsset',
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public static function addScript($view, $jsfile) {

        $b=HomeAsset::register($view);
        $view->registerJsFile($b->baseUrl.$jsfile, [HomeAsset::className(), 'depends' => 'app\home\assets\HomeAsset']);
    }

    //定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $b=HomeAsset::register($view);
        $view->registerCssFile($b->baseUrl.$cssfile, [HomeAsset::className(), 'depends' => 'app\home\assets\HomeAsset']);
    }

}
