<?php
\app\home\assets\HomeAsset::addCss($this, '/css/wangEditor.min.css');
\app\home\assets\HomeAsset::addScript($this, '/js/wangEditor.min.js');
?>
<div class="container">

    <div class="control-group">
        <label class="control-label">标题</label>
        <div class="controls">
            <input class="ember-view ember-text-field input-xxlarge" placeholder="" type="text" value="woshi">
        </div>

    </div>

    <div class="control-group" style="position: relative">
        <label class="control-label">分类</label>
        <div class="controls">

    <div class="category-input">
        <div class="select2-container ember-view combobox combobox category-combobox" id="s2id_ember1439"
             style="width: 430px;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1"> <span
                    class="select2-chosen" id="select2-chosen-24">支持</span><abbr
                    class="select2-search-choice-close"></abbr> <span class="select2-arrow" role="presentation"><b
                        role="presentation"></b></span></a><label for="s2id_autogen24"
                                                                  class="select2-offscreen"></label><input
                class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button"
                aria-labelledby="select2-chosen-24" id="s2id_autogen24" tabindex="3"></div>


    </div>

    <div class="select2-drop select2-display-none select2-with-searchbox select2-drop-active"
         style=" display: block;position: absolute;top:0;width: 430px;" id="select2-drop">
        <div class="select2-search"><label for="s2id_autogen24_search" class="select2-offscreen"></label> <input
                type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list"
                aria-owns="select2-results-24" id="s2id_autogen24_search" placeholder=""
                aria-activedescendant="select2-result-label-95"></div>
        <ul class="select2-results" role="listbox" id="select2-results-24">


            <li class="select2-results-dept-0 select2-result select2-result-selectable select2-highlighted"
                role="presentation">
                <div class="select2-result-label" id="select2-result-label-95" role="option"><span
                        class="badge-wrapper bullet"><span class="badge-category-bg"
                                                           style="background-color: #0E76BD;"></span><span
                            style="color: #000000;" data-drop-close="true" class="badge-category clear-badge"
                            title="关于 Discourse 插件、主题、扩展以及使用 Discourse 的扩展方式。">扩展性</span></span>&nbsp;<span
                        class="badge-wrapper bullet"><span class="badge-category-bg"
                                                           style="background-color: #12A89D;"></span><span
                            style="color: #000000;" data-drop-close="true" class="badge-category clear-badge"
                            title="用作收集适用于大陆地区的 Discourse 插件的分类。">插件</span></span> <span class="topic-count">× 18</span>
                    <div class="category-desc">用作收集适用于大陆地区的 Discourse 插件的分类。</div>
                </div>
            </li>
            <li class="select2-results-dept-0 select2-result select2-result-selectable" role="presentation">
                <div class="select2-result-label" id="select2-result-label-96" role="option"><span
                        class="badge-wrapper bullet"><span class="badge-category-bg"
                                                           style="background-color: #652D90;"></span><span
                            style="color: #000000;" data-drop-close="true" class="badge-category clear-badge"
                            title="讨论关于 Discourse 开发、翻译、插件以及技术架构的分类。">开发</span></span> <span
                        class="topic-count">× 24</span>
                    <div class="category-desc">讨论关于 Discourse 开发、翻译、插件以及技术架构的分类。</div>
                </div>
            </li>


        </ul>
    </div>
        </div>

    </div>


    <div class="control-group">
        <label class="control-label">内容</label>
        <div class="controls">
    <textarea id="textarea1" style="height:400px;max-height:500px;">
    <p>请输入内容...</p>
</textarea>
        </div>

    </div>

    <div class="submit-panel">
        <!---->
        <!---->            <button tabindex="5" data-ember-action="1889" class="btn btn-primary create " title="或 Ctrl + 回车"><i class="fa fa-plus"></i>创建主题</button>
        <a href="" class="cancel" tabindex="6" data-ember-action="1892">取消</a>

        <!---->          </div>

</div>
<?php \common\widgets\JsBlock::begin(); ?>


<script type="text/javascript">
    var editor = new wangEditor('textarea1');
    editor.create();
</script>
<?php \common\widgets\JsBlock::end(); ?>
