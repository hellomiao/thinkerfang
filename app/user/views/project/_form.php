<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\user\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName(),'options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <?php if(!$model->isNewRecord){
        echo Html::img(\app\user\models\Project::getImgUrl($model->picture),['width'=>'50px']);}?>
    <?= $form->field($model, 'picture')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step')->dropDownList(\app\user\models\Project::$stepArr) ?>

    <?= $form->field($model, 'category_id')->dropDownList(\app\cms\models\Category::getSelectList(4)) ?>

    <?= $form->field($model, 'team')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?=
    $form->field($model, 'content')->widget(\app\admin\components\Ueditor::className(), [
        'style' => 'width:100%;height:400px',
        'renderTag' => true,
        'jsOptions' => [
            'serverUrl' => yii\helpers\Url::to(['upload']),
            'autoHeightEnable' => true,
            'autoFloatEnable' => true,
            'toolbars' => [
                [
                    'fullscreen', 'source', 'undo', 'redo', '|',
                    'fontsize',
                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                    'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                    'forecolor', 'backcolor', '|',
                    'lineheight', '|',
                    'indent', '|','simpleupload','insertimage','insertvideo','|',    'justifyleft', //居左对齐
                    'justifyright', //居右对齐
                    'justifycenter', //居中对齐
                    'justifyjustify', //两端对齐
                ],
            ]
        ],

    ])
    ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php \common\widgets\JsBlock::begin();?>
    <script>

        ajax_form('<?php echo $model->formName();?>', '<?php echo \yii\helpers\Url::to(['index']);?>');

    </script>
<?php \common\widgets\JsBlock::end();?>