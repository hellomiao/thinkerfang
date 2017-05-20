<?php

use yii\helpers\Html;
use app\install\assets;


/* @var $this \yii\web\View */
/* @var $content string */
assets\InstallAsset::register($this);
$module = \Yii::$app->controller->module;
$appName=$module->params['AppName'];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="<?= \dmstr\helpers\AdminLteHelper::skinClass() ?>">
        <?php $this->beginBody() ?>
        <div class="wrap">
            <div class="header">
                <h1 class="logo"><?php echo $appName?></h1>
                <div class="icon_install">安装向导</div>
                <div class="version">QQ群:115303179</div> 
            </div>


            <?php echo $content ?>

        </div>
        <div class="footer">  2013 - 2014 <a href="http://www.inuoer.com" target="_blank"><?php echo $appName?></a>  </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

