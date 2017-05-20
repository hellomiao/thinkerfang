<?php
$config = new \app\base\models\Config();
$name = $config->getData('site-name');
?>
<div id="simple-container">

    <?php if($set){?>
    <p>
        你的密码已经修改成功，你现在已经登录。
        <br>
        <br>
        <a class="btn" href="<?php echo Yii::$app->getHomeUrl();?>">转入到 <?php echo $name;?></a>
    </p>


    <?php }else{?>

    <?php if($flag){?>


            <h3>
                请选择一个新密码
            </h3>

            <form action="" accept-charset="UTF-8" method="post">
                <input name="user_id" type="hidden" value="<?php echo $user_id;?>">
                <p>
                    <input name="<?php echo Yii::$app->request->csrfParam; ?>" type="hidden" id="_csrf"
                           value="<?= Yii::$app->request->csrfToken ?>">
                    <span style="display: none;"><input name="username" type="text" value="KONG"></span>
                    <input id="new-account-password" name="password" size="30" type="password" maxlength="200">

                    <label>至少需要 8 个字符。</label>

                </p>
                <div  class="caps-lock-warning invisible"><i class="fa fa-exclamation-triangle"></i> 大小写锁定开启</div>
                <p>
                    <input type="submit" name="commit" value="更新密码" class="btn">
                </p>
            </form>


<?php }else{?>

    <div class="alert alert-error">
        抱歉，此密码重置链接已经失效,请重新发起找回密码.
    </div>
<?php  }?>


    <?php  }?>

</div>





