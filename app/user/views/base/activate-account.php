<?php
$config = new \app\base\models\Config();
$name = $config->getData('site-name');
?>
<div id="simple-container">

    <?php if($flag){?>
    <h2>欢迎来到<?php echo $name;?></h2>
    <br>
        <div class="alert alert-success">
            恭喜你成功激活你的账号,点击下面按钮登录.
        </div>
    <button class="btn login-button">点击这儿登录</button>


<?php }else{?>

    <div class="alert alert-error">
        抱歉，此帐号激活链接已经失效。可能你的帐号已经被激活了？
    </div>
<?php  }?>
</div>




