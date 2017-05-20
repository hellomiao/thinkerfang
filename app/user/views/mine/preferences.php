

<div class="container viewing-self">
    <section class="user-main">
        <?= $this->render('common', [
        ]) ?>




        <div class="user-table">
            <div class="wrapper">
                <div class="ember-view user-preferences"><section class="user-content user-preferences">

                        <form class="form-horizontal">

                            <div class="control-group save-button" id="save-button-top">
                                <div class="controls">
                                    <button  class="ember-view btn btn-primary save-user no-text">  保存修改
                                    </button>
                                    <!---->
                                </div>
                            </div>

                            <div class="control-group pref-username">
                                <label class="control-label">用户名</label>
                                <div class="controls">
                                    <span class="static"><?php echo $user->username;?></span>

                                </div>
                                <div class="instructions">
                                    其他人可以用 @<?php echo $user->username;?> 来提及你
                                </div>
                            </div>

                            <div class="control-group pref-name">
                                <label class="control-label">昵称</label>
                                <div class="controls">
                                    <input class="ember-view ember-text-field input-xxlarge" placeholder="" type="text" value="<?php echo $user->nickname;?>">
                                </div>
                                <div class="instructions">
                                    你的昵称（可选）
                                </div>
                            </div>

                            <!---->
                            <div class="control-group pref-email">
                                <label class="control-label">电子邮箱</label>
                                <div class="controls">
                                    <span class="static"><?php echo $user->email;?></span>
                                    <a  class="ember-view btn btn-small pad-left no-text" href="/users/kong/preferences/email"><i class="fa fa-pencil"></i></a>
                                </div>
                                <div class="instructions">
                                    绝不会被公开显示
                                </div>
                            </div>

                            <div class="control-group pref-password">
                                <label class="control-label">密码</label>
                                <div class="controls">
                                    <a href="" class="btn" data-ember-action="1584">
                                        <i class="fa fa-envelope"></i>
                                        发送密码重置邮件
                                    </a>
                                    <!---->
                                </div>
                            </div>

                            <div class="control-group pref-avatar">
                                <label class="control-label">头像</label>
                                <div class="controls">
                                    <img alt="" width="120" height="120" src="//o9kizyxbw.qnssl.com/letter_avatar_proxy/v2/letter/k/2acd7d/240.png" class="avatar">
                                    <button id="upload_avatar_btn" class="ember-view pad-left btn no-text" type="button"><i class="fa fa-pencil"></i> </button>
                                </div>
                            </div>

                            <div class="control-group pref-profile-bg">
                                <label class="control-label">个人资料背景</label>
                                <div class="controls">
                                    <div  class="ember-view image-uploader"><div class="uploaded-image-preview input-xxlarge" style="background-image: url(/uploads/default/original/1X/83ae8c93d3f52aaa6ba5ee4062011fd4d3203a84.jpg)">
                                            <div class="image-upload-controls">
                                                <label class="btn pad-left no-text ">
                                                    <i class="fa fa-picture-o"></i>
                                                    <input type="file" accept="image/*" style="visibility: hidden; position: absolute;">
                                                </label>
                                                <button class="btn btn-danger pad-left no-text" data-ember-action="1590"><i class="fa fa-trash-o"></i></button>
                                                <span class="btn hidden">上传中 0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="instructions">
                                    个人资料背景将被居中，且默认宽度为 850px。
                                </div>
                            </div>

                            <div class="control-group pref-profile-bg">
                                <label class="control-label">用户资料背景</label>
                                <div class="controls">
                                    <div  class="ember-view image-uploader"><div class="uploaded-image-preview input-xxlarge" style="background-image: url(/uploads/default/original/1X/83ae8c93d3f52aaa6ba5ee4062011fd4d3203a84.jpg)">
                                            <div class="image-upload-controls">
                                                <label class="btn pad-left no-text ">
                                                    <i class="fa fa-picture-o"></i>
                                                    <input type="file" accept="image/*" style="visibility: hidden; position: absolute;">
                                                </label>
                                                <button class="btn btn-danger pad-left no-text" data-ember-action="1592"><i class="fa fa-trash-o"></i></button>
                                                <span class="btn hidden">上传中 0%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="instructions">
                                    背景图片将被居中并且默认宽度为 590px。
                                </div>
                            </div>

                            <div class="control-group pref-locale">
                                <label class="control-label">界面语言</label>
                                <div class="controls">
                                    <div class="select2-container ember-view combobox" id="s2id_ember1593" style="width: 220px;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-56">zh_CN</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen56" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-56" id="s2id_autogen56"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen56_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-56" id="s2id_autogen56_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-56">   </ul></div></div><select id="ember1593" class="ember-view combobox" tabindex="-1" title="" style="display: none;"><option value="">（默认）</option><option value="ar">ar</option><option value="bs_BA">bs_BA</option><option value="cs">cs</option><option value="da">da</option><option value="de">de</option><option value="en">en</option><option value="es">es</option><option value="et">et</option><option value="fa_IR">fa_IR</option><option value="fi">fi</option><option value="fr">fr</option><option value="gl">gl</option><option value="he">he</option><option value="id">id</option><option value="it">it</option><option value="ja">ja</option><option value="ko">ko</option><option value="nb_NO">nb_NO</option><option value="nl">nl</option><option value="pl_PL">pl_PL</option><option value="pt">pt</option><option value="pt_BR">pt_BR</option><option value="ro">ro</option><option value="ru">ru</option><option value="sk">sk</option><option value="sq">sq</option><option value="sv">sv</option><option value="te">te</option><option value="tr_TR">tr_TR</option><option value="uk">uk</option><option value="vi">vi</option><option selected="" value="zh_CN">zh_CN</option><option value="zh_TW">zh_TW</option></select>
                                </div>
                                <div class="instructions">
                                    用户界面语言。将在你刷新页面后改变。
                                </div>
                            </div>

                            <div class="control-group pref-bio">
                                <label class="control-label">关于我</label>
                                <div class="controls bio-composer">
                                    <div  class="ember-view d-editor"><div class="d-editor-overlay hidden"></div>
                                        <div class="d-editor-modals">
                                            <div id="ember1594" class="ember-view insert-link d-editor-modal hidden">
                                                <h3>插入链接</h3>
                                                <input id="ember1601" class="ember-view ember-text-field link-url" placeholder="http://example.com" type="text">
                                                <input id="ember1602" class="ember-view ember-text-field link-text" placeholder="可选标题" type="text">


                                                <div class="controls">
                                                    <button id="ember1599" class="ember-view btn-primary btn">确认</button>
                                                    <button id="ember1600" class="ember-view btn-danger btn">取消</button>
                                                </div>
                                            </div></div>

                                        <div class="d-editor-container">
                                            <div class="d-editor-button-bar">
                                                <button id="ember1603" class="ember-view btn no-text bold" title="加粗 (⌘B)"><i class="fa fa-bold"></i> </button>
                                                <button id="ember1604" class="ember-view btn no-text italic" title="斜体 (⌘I)"><i class="fa fa-italic"></i> </button>
                                                <div class="d-editor-spacer"></div>
                                                <button id="ember1605" class="ember-view btn no-text link" title="链接 (⌘K)"><i class="fa fa-link"></i> </button>
                                                <button id="ember1606" class="ember-view btn no-text quote" title="引用 (⌘⇧9)"><i class="fa fa-quote-right"></i> </button>
                                                <button id="ember1607" class="ember-view btn no-text code" title="预格式化文本 (⌘⇧C)"><i class="fa fa-code"></i> </button>
                                                <div class="d-editor-spacer"></div>
                                                <button id="ember1608" class="ember-view btn no-text bullet" title="符号列表 (⌘⇧8)"><i class="fa fa-list-ul"></i> </button>
                                                <button id="ember1609" class="ember-view btn no-text list" title="数字列表 (⌘⇧7)"><i class="fa fa-list-ol"></i> </button>
                                                <button id="ember1610" class="ember-view btn no-text heading" title="标题 (⌘⌥1)"><i class="fa fa-font"></i> </button>
                                                <button id="ember1611" class="ember-view btn no-text rule" title="分割线 (⌘⌥R)"><i class="fa fa-minus"></i> </button>
                                                <button id="ember1612" class="ember-view btn no-text emoji" title="Emoji :)"><i class="fa fa-smile-o"></i> </button>
                                                <!---->  </div>
                                            <div class="d-editor-preview-header"></div>

                                            <div class="d-editor-textarea-wrapper">
                                                <div id="ember1595" class="ember-view"><!----></div>
                                                <textarea id="ember1596" class="ember-view ember-text-area d-editor-input"><!----></textarea>
                                                <div id="ember1597" class="ember-view popup-tip good hide"></div>
                                            </div>

                                            <div class="d-editor-preview-wrapper ">
                                                <div class="d-editor-preview">
                                                    <!---->
                                                </div>
                                                <!---->  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!---->    <div class="clearfix"></div>

                            <div class="control-group pref-location">
                                <label class="control-label">地址</label>
                                <div class="controls">
                                    <input id="edit-location" class="ember-view ember-text-field input-xxlarge" type="text">
                                </div>
                            </div>

                            <div class="control-group pref-website">
                                <label class="control-label">网站</label>
                                <div class="controls">
                                    <input id="ember1558" class="ember-view ember-text-field input-xxlarge" type="text">
                                </div>
                            </div>

                            <div class="control-group pref-card-badge">
                                <label class="control-label">用户资料徽章</label>
                                <div class="controls">
                                    <!---->        <a id="ember1559" class="ember-view btn btn-small pad-left no-text" href="/users/kong/preferences/card-badge"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>

                            <div class="control-group pref-email-settings">
                                <label class="control-label">电子邮箱</label>
                                <div class="controls controls-dropdown">
                                    <label>在邮件底部包含过往回复</label>
                                    <div class="select2-container ember-view combobox" id="s2id_ember1560" style="width: 220px;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-57">从不</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen57" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-57" id="s2id_autogen57"></div><select id="ember1560" class="ember-view combobox" tabindex="-1" title="" style="display: none;"><option value="0">总是</option><option value="1">如果还没收到过</option><option selected="" value="2">从不</option></select>
                                </div>
                                <div class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1613" class="ember-view ember-checkbox" type="checkbox">
                                        在邮件中附带回复你的帖子的内容节选
                                    </label>
                                </div>
                                <div  class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1615" class="ember-view ember-checkbox" type="checkbox">
                                        当有人发消息给我时，发送一封邮件给我
                                    </label>
                                </div>
                                <div  class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1617" class="ember-view ember-checkbox" type="checkbox">
                                        当有人引用我、回复我的帖子、@提及我或邀请我至主题时，发送一封邮件给我
                                    </label>
                                </div>
                                <div  class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1619" class="ember-view ember-checkbox" type="checkbox">
                                        即使我在论坛中活跃时也发送电子邮件提醒给我
                                    </label>
                                </div>
                                <div class="instructions">
                                    我们只会在你最近 10 分钟内没有访问时才会发送电子邮件给你。
                                </div>
                            </div>

                            <div class="control-group pref-activity-summary">
                                <label class="control-label">Activity Summary</label>
                                <div  class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1622" class="ember-view ember-checkbox" type="checkbox">
                                        When I don't visit here, send me an email summary of popular topics and replies
                                    </label>
                                </div>
                                <div class="controls controls-dropdown">
                                    <div class="select2-container ember-view combobox" id="s2id_ember1624" style="width: 220px;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-55">每两周</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen55" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-55" id="s2id_autogen55"></div><select id="ember1624" class="ember-view combobox" tabindex="-1" title="" style="display: none;"><option value="30">每半小时</option><option value="60">每小时</option><option value="1440">每天</option><option value="4320">每三天</option><option value="10080">每周</option><option selected="" value="20160">每两周</option></select>
                                </div>
                                <div  class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1626" class="ember-view ember-checkbox" type="checkbox">
                                        Include content from new users in summary emails
                                    </label>
                                </div>
                            </div>

                            <div class="control-group pref-mailing-list-mode">
                                <label class="control-label">Mailing list mode</label>
                                <div  class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1629" class="ember-view ember-checkbox" type="checkbox">
                                        Enable mailing list mode
                                    </label>
                                </div>
                                <div class="instructions">This setting overrides the activity summary.<br>
                                    Muted topics and categories are not included in these emails.
                                </div>
                                <!---->      </div>

                            <div class="control-group notifications">
                                <label class="control-label">桌面通知</label>
                                <div  class="ember-view controls">
                                    <!---->  <button id="ember1631" class="ember-view btn"><i class="fa fa-bell-slash"></i> 启用通知</button>
                                    <!----><!----></div>
                                <div class="instructions">注意：你必须在你使用的所用浏览器中更改这项设置。</div>
                            </div>

                            <div class="control-group other">
                                <label class="control-label">其它</label>

                                <div class="controls controls-dropdown">
                                    <label>近期主题的条件：</label>
                                    <div class="select2-container ember-view combobox" id="s2id_ember1566" style="width: 280px;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-58">在这 2 天创建</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen58" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-58" id="s2id_autogen58"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen58_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-58" id="s2id_autogen58_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-58">   </ul></div></div><select id="ember1566" class="ember-view combobox" tabindex="-1" title="" style="display: none;"><option value="-1">我还没有浏览它们</option><option value="1440">在昨天创建</option><option selected="" value="2880">在这 2 天创建</option><option value="10080">在上周创建</option><option value="20160">在这 2 周创建</option><option value="-2">在你最近一次访问之后创建的</option></select>
                                </div>

                                <div class="controls controls-dropdown">
                                    <label>自动追踪我进入的主题</label>
                                    <div class="select2-container ember-view combobox" id="s2id_ember1567" style="width: 280px;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-59">4 分钟之后</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen59" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-59" id="s2id_autogen59"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen59_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-59" id="s2id_autogen59_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-59">   </ul></div></div><select id="ember1567" class="ember-view combobox" tabindex="-1" title="" style="display: none;"><option value="-1">从不</option><option value="0">立刻</option><option value="30000">30 秒之后</option><option value="60000">1 分钟之后</option><option value="120000">2 分钟之后</option><option value="180000">3 分钟之后</option><option selected="" value="240000">4 分钟之后</option><option value="300000">5 分钟之后</option><option value="600000">10 分钟之后</option></select>
                                </div>

                                <div class="controls controls-dropdown">
                                    <label>通知用户赞的消息</label>
                                    <div class="select2-container ember-view combobox" id="s2id_ember1568" style="width: 280px;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-60">每天第一个被赞帖子</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen60" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-60" id="s2id_autogen60"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen60_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-60" id="s2id_autogen60_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-60">   </ul></div></div><select id="ember1568" class="ember-view combobox" tabindex="-1" title="" style="display: none;"><option value="0">始终</option><option selected="" value="1">每天第一个被赞帖子</option><option value="2">第一个被赞的帖子</option><option value="3">从不</option></select>
                                </div>

                                <div id="ember1569" class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1632" class="ember-view ember-checkbox" type="checkbox">
                                        始终在新的标签页打开外部链接
                                    </label>
                                </div>
                                <div id="ember1570" class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1634" class="ember-view ember-checkbox" type="checkbox">
                                        在高亮选择文字时显示引用回复按钮
                                    </label>
                                </div>
                                <div id="ember1571" class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1636" class="ember-view ember-checkbox" type="checkbox">
                                        在浏览器图标上显示新/更新的主题数量
                                    </label>
                                </div>
                                <div id="ember1572" class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1638" class="ember-view ember-checkbox" type="checkbox">
                                        不要在回复后跳转到我的新帖子
                                    </label>
                                </div>
                                <!---->
                                <!---->
                            </div>

                            <div class="control-group category">
                                <label class="control-label">分类</label>
                                <div class="controls category-controls">
                                    <label><span class="icon fa fa-exclamation-circle watching"></span> 已关注</label>
                                    <div  class="ember-view"><div class="ac-wrap clearfix" style="width: 530px;"><input class="category-group" type="text" name="undefined-renamed" style="width: 150px;"></div>
                                    </div>
                                </div>
                                <div class="instructions">你将会自动监视这些分类中的所有新主题。你会收到新帖子或新主题的通知，并且新帖数量也将在每个主题后显示。</div>
                                <div class="controls category-controls">
                                    <a href="/latest?state=watching">Show watched topics</a>
                                </div>
                                <div class="instructions"></div>
                                <div class="controls category-controls">
                                    <label><span class="icon fa fa-circle tracking"></span> 已追踪</label>
                                    <div  class="ember-view"><div class="ac-wrap clearfix" style="width: 530px;"><input class="category-group" type="text" name="undefined-renamed" style="width: 150px;"></div>
                                    </div>
                                </div>
                                <div class="instructions">你将会自动追踪这些分类中的所有新主题。新帖数量将在每个主题后显示。</div>
                                <div class="controls category-controls">
                                    <label><span class="icon fa fa-times-circle muted"></span> 已屏蔽</label>
                                    <div  class="ember-view"><div class="ac-wrap clearfix" style="width: 530px;"><input class="category-group" type="text" name="undefined-renamed" style="width: 150px;"></div>
                                    </div>
                                </div>
                                <div class="instructions">你不会收到这些分类中的任何新主题通知，并且他们将不会出现在最新列表中。</div>
                                <div class="controls category-controls">
                                    <a href="/latest?state=muted">显示已忽略的主题</a>
                                </div>
                            </div>

                            <div class="control-group muting">
                                <label class="control-label">用户</label>
                                <div class="controls category-controls">
                                    <label><span class="icon fa fa-times-circle muted"></span> 忽略</label>
                                    <div class="ac-wrap clearfix" style="width: 530px;"><input id="ember1576" class="ember-view ember-text-field user-selector" placeholder="" type="text" name="undefined-renamed" style="width: 150px;"></div>
                                </div>
                                <div class="instructions">禁止任何关于这些用户的通知。</div>
                            </div>

                            <div class="control-group topics">
                                <label class="control-label">近期</label>
                                <div  class="ember-view controls"><label class="checkbox-label">
                                        <input id="ember1641" class="ember-view ember-checkbox" type="checkbox">
                                        当我完整阅读了主题时自动解除置顶。
                                    </label>
                                </div>
                            </div>

                            <!---->

                            <div class="control-group save-button">
                                <div class="controls">
                                    <button  class="ember-view btn btn-primary save-user no-text">  保存修改
                                    </button>
                                    <!---->
                                </div>
                            </div>

                            <div class="control-group delete-account">
                                <hr>
                                <div class="controls">
                                    <button  class="ember-view btn-danger btn"><i class="fa fa-trash-o"></i> 删除我的帐号</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>


    </section>
</div>





<div class="remodal" data-remodal-id="avatar">

    <div class="modal-header">
        <a class="close" data-remodal-action="close"><i class="fa fa-times"></i></a>
        <h3>更改你的头像</h3>
        <div class="clearfix"></div>
    </div>

    <div id="reset-password-modal-alert" style="display: none;" class="alert alert-success"></div>
    <div class="ember-view avatar-selector">
        <div class="modal-body">
            <div>
                <div>
                    <input type="radio" id="system-avatar" name="avatar" value="system" data-ember-action="1349">
                    <label class="radio" for="system-avatar"><img alt="" width="45" height="45" src="//o9kizyxbw.qnssl.com/letter_avatar_proxy/v2/letter/k/2acd7d/90.png" class="avatar"> 系统分配的头像</label>
                </div>

                <div>
                    <input type="radio" id="uploaded_avatar" name="avatar" value="uploaded" data-ember-action="1357">
                    <label class="radio" for="uploaded_avatar">
                        <img alt="" width="45" height="45" src="//o9kizyxbw.qnssl.com/user_avatar/meta.discoursecn.org/kong/90/826_1.png" class="avatar">
                        自定义图片
                    </label>
        <span id="ember1366" class="ember-view"><label class="btn" title="上传图片">
                <i class="fa fa-picture-o"></i>&nbsp;上传图片
                <input type="file" accept="image/*" style="visibility: hidden; position: absolute;">
            </label>
            <!----><!----></span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="ember1355" class="ember-view btn-primary btn">保存修改</button>
            <a data-remodal-action="close">取消</a>
        </div>

    </div>

</div>

<?php \common\widgets\JsBlock::begin();?>
<script>
    $(function(){
        $("#upload_avatar_btn").click(function () {
            var inst = $('[data-remodal-id=avatar]').remodal();

            inst.open();
        });

    });
</script>
<?php \common\widgets\JsBlock::end();?>