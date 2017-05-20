<?php
use yii\helpers\Url;

$action = $this->context->action->id;
$is_self = $this->context->_user->username == $this->context->user->username ? true : false;
?>
<section class="collapsed-info about has-background"
         style="background-image: url(//o9kizyxbw.qnssl.com/uploads/default/original/1X/83ae8c93d3f52aaa6ba5ee4062011fd4d3203a84.jpg)">
    <!---->
    <div class="profile-image"></div>
    <div class="details">
        <div class="primary">
            <img alt="" width="120" height="120" src="<?php echo $this->context->_user->getPicture(240); ?>"
                 class="avatar">
            <section class="controls">
                <ul>
                    <!----><!---->              <!---->

                    <li><a href="" class="btn" data-ember-action="931"><i class="fa fa-angle-double-down"></i>展开</a>
                    </li>

                </ul>
            </section>

            <div class="primary-textual">
                <h1 class="username"><?php echo $this->context->_user->username; ?><!----></h1>
                <h2 class="full-name"><?php echo $this->context->_user->nickname; ?></h2>
                <!----> <h3>
                    <!---->
                    <!---->            </h3>

                <div class="bio">
                    <!---->              <!---->
                </div>

                <!---->
                <!---->

            </div>
        </div>
        <div style="clear: both"></div>
    </div>


    <!---->    </section>

<ul class="nav nav-pills user-nav">
    <li><a class="ember-view <?php if ($action == 'activity') { ?>active<?php } ?>"
           href="<?php echo Url::to(['/user/' . $this->context->_user->username . '/activity']); ?>">活动</a></li>
    <?php if($is_self){?>
    <li>
        <a class="ember-view" href="/users/kong/notifications"> <i class="fa fa-comment glyph"></i>通知
        </a></li>
    <li><a class="ember-view" href="/users/kong/messages"><i class="fa fa-envelope-o"></i>消息</a></li>

    <?php }?>
    <!----><!---->
    <li><a id="ember936" class="ember-view" href="/users/kong/summary">概要</a></li>
    <?php if($is_self){?>

    <li><a class="ember-view <?php if ($action == 'preferences') { ?>active<?php } ?>"
           href="<?php echo Url::to(['/user/' . $this->context->_user->username . '/preferences']); ?>"><i
                class="fa fa-cog"></i>设置</a></li>
    <?php }?>
</ul>