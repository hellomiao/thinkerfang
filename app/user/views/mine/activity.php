<div class="container">
    <!---->
    <div id="ember826" class="ember-view"></div>
    <div id="ember837" class="ember-view hidden create-topics-notice"><!----></div>
</div>


<div class="container viewing-self">
    <section class="user-main">
        <?= $this->render('common', [
        ]) ?>
        <div class="user-table">
            <div class="wrapper">
                <section class="user-navigation">
                    <ul id="ember1042" class="action-list activity-list nav-stacked">    <li class="no-glyph">
                            <a id="ember1048" class="ember-view active" href="/users/kong/activity">全部</a>
                        </li>
                        <li class="no-glyph">
                            <a id="ember1049" class="ember-view" href="/users/kong/activity/topics">主题</a>
                        </li>
                        <li>
                            <a id="ember1050" class="ember-view" href="/users/kong/activity/replies">        <i class="glyph fa fa-reply"></i>回复
                            </a>    </li>
                        <li>
                            <a id="ember1051" class="ember-view" href="/users/kong/activity/likes-given">        <i class="glyph fa fa-heart"></i>给赞
                            </a>    </li>
                        <li>
                            <a id="ember1076" class="ember-view" href="/users/kong/activity/bookmarks">        <i class="glyph fa fa-bookmark"></i>书签
                            </a>    </li>
                        <!---->

                    </ul>
                    <div class="user-archive">
                        <button id="ember1093" class="ember-view btn"><i class="fa fa-download"></i> 下载我的帖子</button>
                    </div>

                </section>

                <section class="user-right">
                    <div id="ember1139" class="ember-view user-stream"><!----></div>
                </section>


            </div>
        </div>

    </section>
</div>