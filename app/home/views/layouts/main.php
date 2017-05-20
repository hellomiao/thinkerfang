<?php
use yii\helpers\Url;
use app\home\assets\HomeAsset;
$bundle = HomeAsset::register($this);
$config = new \app\base\models\Config();
$info = $config->getData('site-info');
$name = $config->getData('site-name');
$logo = \Yii::$app->imgUpload->getSaveUrl() . '/' . $config->getData('site-logo');
$module = $this->context->module->id;
$controller = $this->context->id;
$action = $this->context->action->id;
$top_view_flag = ($module == 'user' && $controller != 'base') || $module != 'user';
$is_login = !\Yii::$app->user->isGuest;
if($is_login){
    $picture = $this->context->user->getPicture(64);
}
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<head>
    <title><?php echo $name; ?></title>
    <?= \yii\helpers\Html::csrfMetaTags() ?>
    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <style>
        @font-face {
            font-family: 'FontAwesome';
            src: url('<?php echo $this->context->assetUrl;?>/fonts/fontawesome-webfont.woff2?http://meta.discoursecn.org&amp;2&v=4.5.0') format('woff2'),
            url('<?php echo $this->context->assetUrl;?>/fonts/fontawesome-webfont.woff?http://meta.discoursecn.org&amp;2&v=4.5.0') format('woff');
        }
    </style>

    <?php $this->head() ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script>var __crsf_name = '<?php echo Yii::$app->request->csrfParam;?>';</script>

</head>
<script>var assetUrl = "<?php echo Yii::$app->assetManager->getPublishedUrl('@app/home/misc');?>"</script>
<body class="homepage">
<?php $this->beginBody() ?>


<section id="main" class="ember-application">
    <div id="ember782" class="ember-view">
        <div id="ember806" class="ember-view"><!---->
            <header class="d-header clearfix">
                <div class="wrap">

                    <div class="contents clearfix">
                        <div class="title"><a href="/" data-auto-route="true"><img
                                    src="<?php echo $logo; ?>"
                                    alt="<?php echo $name; ?>" id="site-logo" class="logo-big"></a></div>
                        <div class="panel clearfix">
                            <?php if (!$is_login) { ?>
                                <span>



                                <?php if ($top_view_flag) { ?>
                                    <button
                                        class="widget-button btn-primary btn-small sign-up-button" aria-label="注册"
                                        title="注册">注册
                                    </button>

                                <?php } ?>

                                    <button class="widget-button btn-primary btn-small login-button"
                                            aria-label="登录" title="登录"><i class="fa fa-user"
                                                                          aria-hidden="true"></i>登录
                                    </button></span>

                            <?php } ?>

                            <?php if ($top_view_flag) { ?>
                                <ul role="navigation" class="icons clearfix">
                                    <li class="header-dropdown-toggle"><a href="/search" data-auto-route="true"
                                                                          title="搜索主题、帖子、用户或分类"
                                                                          aria-label="搜索主题、帖子、用户或分类"
                                                                          id="search-button" class="icon"><i
                                                class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li class="header-dropdown-toggle"><a data-auto-route="true" title="去另一个主题列表或分类"
                                                                          aria-label="去另一个主题列表或分类"
                                                                          id="toggle-hamburger-menu" class="icon"><i
                                                class="fa fa-bars" aria-hidden="true"></i></a></li>

                                    <?php if ($is_login) { ?>
                                        <li id="current-user" class="header-dropdown-toggle current-user">
                                            <a href="<?php echo Url::to(["/user/{$this->context->username}/activity"]);?>" class="icon">

                                                <img alt="" width="32" height="32"
                                                     src="<?php echo $picture;?>"
                                                     title="KONG" class="avatar">
                                                <a class="widget-link badge-notification unread-private-messages"
                                                   title="1">1</a>

                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <div id="main-outlet" class="wrap" style="padding-bottom: 0px;">
            <div class="container">
                <!---->
                <div id="ember822" class="ember-view"></div>
                <div id="ember833" class="ember-view hidden create-topics-notice"><!----></div>
            </div>
            <?php if ($module == 'home' && $controller == 'default' && $action == 'index') { ?>
                <div class="container">
                    <div id="ember919" class="ember-view">
                        <div class="row">
                            <div id="banner">
                                <div id="banner-content">
                                    <div class="close" data-ember-action="929"><i class="fa fa-times" title="隐藏横幅。"></i>
                                    </div>
                                    <?php echo $info; ?>
                                    <!---->    </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?= $content; ?>
        </div>

        <!---->
        <!----><!---->

        <div class="remodal" data-remodal-id="signup">
            <div class="modal-header">
                <a class="close" data-remodal-action="close"><i class="fa fa-times"></i></a>
                <h3>创建新帐号</h3>
                <div class="clearfix"></div>
            </div>


            <div class="modal-body">
                <form id="userSignupForm" action="<?php echo Url::to(['/user/ajax/signup']); ?>">
                    <input name="<?php echo Yii::$app->request->csrfParam; ?>" type="hidden" id="_csrf"
                           value="<?= Yii::$app->request->csrfToken ?>">
                    <table>

                        <tr class="input">
                            <td class="label"><label for="new-account-email">电子邮箱</label></td>
                            <td>
                                <input id="new-account-email" class="ember-view ember-text-field" autofocus=""
                                       name="User[email]" type="email"
                                       data-ajax-url="<?php echo Url::to(['/user/ajax/check-email']); ?>">
                                &nbsp;
                                <div id="email-validation" class="ember-view tip bad"></div>
                            </td>
                        </tr>
                        <tr class="instructions">
                            <td></td>
                            <td><label>绝不会被公开显示</label></td>
                        </tr>

                        <tr class="input">
                            <td class="label"><label for="new-account-username">用户名</label></td>
                            <td>
                                <input id="new-account-username" class="ember-view ember-text-field" maxlength="20"
                                       autocomplete="off" name="User[username]" type="text"
                                       data-ajax-url="<?php echo Url::to(['/user/ajax/check-username']); ?>">
                                &nbsp;
                                <div id="username-validation" class="ember-view tip bad"></div>
                            </td>
                        </tr>
                        <tr class="instructions">
                            <td></td>
                            <td><label>唯一，没有空格，简短</label></td>
                        </tr>

                        <tr class="input">
                            <td style="width:80px" class="label">
                                <label for="new-account-nickname">昵称</label>
                            </td>
                            <td style="width:496px">
                                <input id="new-account-nickname" name="User[nickname]"
                                       class="ember-view ember-text-field"
                                       placeholder="" type="text">&nbsp;
                                <div id="nickname-validation" class="ember-view tip good"></div>
                            </td>
                        </tr>
                        <tr class="instructions">
                            <td></td>
                            <td><label>你的昵称（可选）</label></td>
                        </tr>

                        <!---->

                        <tr class="input">
                            <td class="label"><label for="new-account-password">密码</label></td>
                            <td>
                                <input id="new-account-password" class="ember-view ember-text-field" placeholder=""
                                       name="User[password]" type="password">
                                &nbsp;
                                <div id="pwd-validation" class="ember-view tip bad"></div>
                            </td>
                        </tr>
                        <tr class="instructions">
                            <td></td>
                            <td>
                                <label>至少需要 8 个字符。</label>
                                <div class="caps-lock-warning invisible"><i class="fa fa-exclamation-triangle"></i>
                                    大小写锁定开启
                                </div>
                            </td>
                        </tr>

                        <tr class="password-confirmation">
                            <td><label for="new-account-password-confirmation">请再次输入密码</label></td>
                            <td>
                                <input id="new-account-confirmation" name="User[password_compare]"
                                       class="ember-view ember-text-field" type="password">
                                <div id="pwdconfirmation-validation" class="ember-view tip bad"></div>

                            </td>
                        </tr>

                    </table>

                    <!---->
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-large btn-primary" id="signup-btn"
                        data-success-url="<?php echo Url::to(['/user/account-created']); ?>" disabled="">创建新帐号
                </button>


                <div class="ember-view inline-spinner loading-cup">
                    <div class="span">
                        <div class="coffee_cup"></div>
                    </div>
                </div>

                <div id="ember1345" class="ember-view inline-spinner">
                    <button class="btn btn-large" id="login-link" data-ember-action="1346">
                        登录
                    </button>
                </div>


            </div>
        </div>


        <div class="remodal" data-remodal-id="signin">
            <div class="modal-header">
                <a class="close" data-remodal-action="close"><i class="fa fa-times"></i></a>
                <h3>登录</h3>
                <div class="clearfix"></div>
            </div>


            <div class="modal-body">
                <form id="signinForm" method="post" action="<?php echo Url::to(['/user/ajax/signin']); ?>">
                    <input name="<?php echo Yii::$app->request->csrfParam; ?>" type="hidden" id="_csrf"
                           value="<?= Yii::$app->request->csrfToken ?>">
                    <div>
                        <div class="alert alert-error signin-error" style="display: none">

                        </div>

                        <table>
                            <tr>
                                <td>
                                    <label for="login-account-name">用户&nbsp;</label>
                                </td>
                                <td>
                                    <input id="login-account-name" class="ember-view ember-text-field"
                                           autocapitalize="off" autocorrect="off" autofocus="" placeholder="电子邮箱地址或用户名"
                                           type="text" name="LoginForm[username]">
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="login-account-password">密码&nbsp;</label>
                                </td>
                                <td>
                                    <input id="login-account-password" class="ember-view ember-text-field"
                                           maxlength="200" placeholder="" type="password" name="LoginForm[password]">
                                    &nbsp;
                                </td>
                                <td>
                                    <a id="forgot-password-link" data-ember-action="1184">忘记密码</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="caps-lock-warning invisible"><i class="fa fa-exclamation-triangle"></i>
                                        大小写锁定开启
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button data-success-url="<?php echo Url::to(['/user']);?>" class="btn btn-large btn-primary" id="signin-btn" disabled>
                    <i class="fa fa-unlock"></i>&nbsp;登录
                </button>
                <!---->
                <div class="ember-view inline-spinner loading-cup">
                    <div class="span">
                        <div class="coffee_cup"></div>
                    </div>
                </div>
                &nbsp;
                <button class="btn btn-large" id="new-account-link">
                    创建新帐号
                </button>


            </div>
        </div>


        <div class="remodal" data-remodal-id="password-reset">

            <div class="modal-header">
                <a class="close" data-remodal-action="close"><i class="fa fa-times"></i></a>
                <h3>重置密码</h3>
                <div class="clearfix"></div>
            </div>

            <div id="reset-password-modal-alert" style="display: none;" class="alert alert-success"></div>
            <div class="ember-view">
                <div class="modal-body">
                    <label for="username-or-email">输入你的用户名和电子邮箱地址，我们会发送密码重置邮件给你。</label>
                    <input id="username-or-email" class="ember-view ember-text-field" autocapitalize="off"
                           autocorrect="off" placeholder="电子邮箱地址或用户名" type="text">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-large btn-primary" id="reset-password-btn"
                            data-url="<?php echo Url::to(['/user/ajax/password-reset']); ?>" disabled="">重置密码
                    </button>


                    <div class="ember-view inline-spinner loading-cup">
                        <div class="span">
                            <div class="coffee_cup"></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div id="topic-entrance" class="ember-view hidden">
            <button id="ember1095" class="ember-view full jump-top btn no-text"><i class="fa fa-caret-up"></i>
                70年1月1日<br>早上8点00分
            </button>
            <button id="ember1096" class="ember-view full jump-button btn no-text"> 70年1月1日<br>早上8点00分 <i
                    class="fa fa-caret-down"></i>
            </button>
        </div>
        <div id="reply-control" class="ember-view closed processed">
            <div class="grippie"></div><!----></div>
    </div>
</section>


<?php $this->endBody() ?>


</body>
<?php $this->endPage() ?>
