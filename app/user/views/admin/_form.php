<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\user\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'value'=>'']) ?>



    <?php if($model->isNewRecord){$model->status_is=='Y';}?>
    <?= $form->field($model, 'status_is')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>



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