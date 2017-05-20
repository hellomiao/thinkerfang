<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $model->realname . '的项目列表';
$this->params['breadcrumbs'][] = $this->title;


?>
<section class="content" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <?php $form = ActiveForm::begin(['id'=>'exportform','action'=>\yii\helpers\Url::to(['export'])]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $projectSearch,
                        'options' => [
                            'id' => 'grid'
                        ],
                        'columns' => [

                            ['class' => 'yii\grid\CheckboxColumn','name' => 'id'],
                            'name',
                            [
                                'attribute' => 'type',
                                'value' => function ($data) {
                                    return $data->projectType->name;
                                }
                            ],

                            [
                                'attribute' => 'username',
                                'label' => '项目经理',
                                'value' => function ($data) {
                                    return $data->user->realname . "({$data->user->username})";
                                }
                            ],
                            'contract_number',
                            [
                                'attribute' => 'in_at',
                                'format' => ['date', 'php:Y-m-d'],
                            ],
                            [
                                'attribute' => 'complete_at',
                                'format' => ['date', 'php:Y-m-d'],
                            ],
                            [
                                'attribute' => 'out_at',
                                'format' => ['date', 'php:Y-m-d'],
                            ],
                            [
                                'attribute' => 'myStamp.real_date',
                                'format' => ['date', 'php:Y-m-d'],
                            ],
                            'myStamp.report_number',
                            [
                                'attribute' => 'finish_at',
                                'format' => ['date', 'php:Y-m-d'],
                            ],
                            [
                                'attribute' => 'amount',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    return $data->getTotal();
                                }
                            ],
                            [
                                'label' => '项目角色',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    $uid = Yii::$app->request->get('uid');

                                    return $data->getType($uid);
                                }
                            ],
                            [
                                'label' => '科目分类',
                                'format' => 'raw',
                                'value' => function ($data) {
                                    $uid = Yii::$app->request->get('uid');
                                    $url = \yii\helpers\Url::to(['/project/default/category', 'id' => $data->id, 'is_complete' => '','uid'=>$uid]);
                                    return "<a href='{$url}'>".$data->getCategoryNum($uid).'</a>';
                                }
                            ],


                        ],
                    ]); ?>
<input type="hidden" name="uid" value="<?=$uid;?>"/>
                    <?= Html::a('导出', "javascript:void(0);", ['class' => 'btn btn-success gridview']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
</section>


<?php \common\widgets\JsBlock::begin();?>
<script>
    $(".gridview").on("click", function () {
//注意这里的$("#grid")，要跟我们第一步设定的options id一致
        var keys = $("#grid").yiiGridView("getSelectedRows");

        $("#exportform").submit();


    });
    </script>
<?php \common\widgets\JsBlock::end();?>