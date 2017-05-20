<?php 
use yii\helpers\Url;

$module = \Yii::$app->controller->module;
$appName=$module->params['AppName'];
$this->title=$appName;?>
<div class="section">
                <div class="main cc">
                    <pre class="pact" readonly="readonly">
				   <?php echo $appName;?>使用协议

                    <b>本系统包含以下功能：</b>

                    1、快速创建微信商城；
                       一杯茶的时间创建您的微信商城。

                    2、丰富的界面；
                       简洁美观的界面，美轮美奂。  
                       
                    3、功能强大的系统；
                       商品，订单，微信等11种功能，全面覆盖。

                    4、多种屏幕预览；
                       支持多种型号手机，平板的预览，保障用户体验。

                    5、全网告诉访问；
                       借助公司的CDN骨干网，全网高速访问您的微信商城，畅享飞速体验。
                    </pre>
                </div>
                <div class="bottom tac"> <a href="<?php echo Url::to(['step'=>'2']);?>" class="btn">接 受</a> </div>
            </div>