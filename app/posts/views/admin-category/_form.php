<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\posts\models\PostsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-category-form">

    <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

    <?= $form->field($model, 'parent_id')->dropDownList($model->getSelectList()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['maxlength' => true]) ?>

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