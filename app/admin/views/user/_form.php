<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\admin\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>




    <?php $form = ActiveForm::begin(['id'=>$model->formName(), 'enableAjaxValidation'=>true,'options'=>['class' => 'form-horizontal'],
        'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ]]); ?>
<div class="box-body">
    <?php if($model->isNewRecord ){?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?php }else{?>

        <div class="form-group field-admin-realname">
            <label class="col-lg-1 control-label" for="admin-realname">用户名</label>
            <div class="col-lg-3"><?= $model->username;?></div>

        </div>
    <?php }?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'value'=>'']) ?>

    <?= $form->field($model, 'realname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>


    <?php
    if(!$model->isNewRecord){
        $model->group_id=explode(',',$model->group_id);
    }

    echo $form->field($model, 'group_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\admin\models\AdminGroup::find()->all(),'id','group_name'),
        'options' => ['placeholder' => '请选择用户组...','multiple' => true],
        'theme' => Select2::THEME_KRAJEE,
        'language' => 'en',
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
            'maximumInputLength' => 10
        ],
    ]);
    ?>


    <?php if($model->isNewRecord){$model->status_is=='Y';}?>
    <?= $form->field($model, 'status_is')->dropDownList([ 'Y' => '启用', 'N' => '禁用', ]) ?>



</div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php \common\widgets\JsBlock::begin();?>
<script>
    $(function(){
        ajax_form('<?php echo $model->formName();?>','<?php echo \yii\helpers\Url::to(['index']);?>');
    })

</script>
<?php \common\widgets\JsBlock::end();?>


