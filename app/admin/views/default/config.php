<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '基本设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
<div class="row">



                <div class="col-md-6">



                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">站点信息</h3>
                        </div>

                        <?php $form = ActiveForm::begin(['id'=>'ConfigForm','options' => ['enctype' => 'multipart/form-data']]) ?>
                            <input type="hidden" name="_backendCsrf" value="NGw1Q2xYbmRAC30zBGBeKl8uZikgYQZSdRhCcC0yNjFHP18VLhEFHA==">
                            <div class="box-body">



                                <div class="form-group field-adminacl-name required">
                                    <label class="control-label" for="adminacl-name">站点名称</label>
                                    <input type="text" class="form-control" name="site-name" value="<?php echo $config->getData('site-name');?>" maxlength="100">


                                </div>


                                <div class="form-group field-adminacl-name required">
                                    <label class="control-label" for="adminacl-name">站点logo</label>
                                    <?php echo Html::img(\Yii::$app->imgUpload->getSaveUrl().'/'.$config->getData('site-logo'),['width'=>'100px']);?>
                                    <input type="file"  class="form-control" name="UploadForm[file]" maxlength="100">


                                </div>

                                <div class="form-group field-adminacl-name required">
                                    <label class="control-label" for="adminacl-name">站点简介</label>
                                    <textarea name="site-info" class="form-control" rows="4"><?php echo $config->getData('site-info');?></textarea>


                                </div>





                                <div class="form-group">
                                    <button id="adminacl-add_btn" class="btn btn-success">设置</button>

                                </div>

                            </div>

                        <?php ActiveForm::end();?>


                    </div>












                </div>

</section>

<?php \common\widgets\JsBlock::begin();?>
<script>
    ajax_form('ConfigForm');
</script>
<?php \common\widgets\JsBlock::end();?>
