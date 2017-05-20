<?php
use yii\helpers\Url;
?>


<div class="container" style="margin-top: 40px">
    <div class="row-fluid blog-page">
        <!-- Right Sidebar -->
        <div class="span3">
            <div class="row-fluid servive-block servive-block-in">
                <div class="span4" style="width: 100%">
                    <h4><a href="<?php echo Url::to(['/user/default/index']);?>">我的项目</a></h4>
                    <p><i class="icon-folder-close-alt"></i></p>

                </div>
                <div class="span4" style="width: 100%">
                    <h4><a href="<?php echo Url::to(['/user/default/info']);?>">资料设置</a></h4>
                    <p><i class="icon-bullhorn"></i></p>

                </div>
                <div class="span4 on" style="width: 100%">
                    <h4><a href="<?php echo Url::to(['/user/default/setpassword']);?>">修改密码</a></h4>
                    <p><i class=" icon-lightbulb"></i></p>

                </div>
            </div>
        </div>

        <!-- Left Sidebar -->

        <div class="span9">

            <div class="headline"><h3>修改密码</h3></div>
            <form class="form-horizontal" method="post">
                <input name="<?php echo Yii::$app->request->csrfParam;?>" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <div class="control-group">
                    <label for="inputPassword" class="control-label">原密码</label>
                    <div class="controls">
                        <input type="password" name="oldpassword" class="border-radius-none" id="inputEmail">
                    </div>
                </div>

                <div class="control-group">
                    <label for="inputPassword" class="control-label">新密码</label>
                    <div class="controls">
                        <input type="password" name="password" class="border-radius-none" id="inputEmail">
                    </div>
                </div>
                <div class="control-group">
                    <label for="inputPassword" class="control-label">重复新密码</label>
                    <div class="controls">
                        <input type="password" name="password1" class="border-radius-none" id="inputPassword">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">

                        <button class="btn-u" type="submit">修改</button>
                    </div>
                </div>
            </form>



        </div>



    </div><!--/row-fluid-->
</div>
