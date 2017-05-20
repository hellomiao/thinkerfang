<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$this->title='员工列表';
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<section class="content">
<div class="row">
    <div class="col-xs-12">


        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">


    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('回收站', ['recycle'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $adminSearch,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'realname',
            'email:email',
            // 'qq',
             'mobile',

            // 'hash',
            [

                'attribute'=>'status_is',
                'filter' => Html::activeDropDownList($adminSearch, 'status_is', \app\admin\models\Admin::getStatus(), ['class' => 'form-control']),
                'value'=>function($data){
                    return \app\admin\models\Admin::getStatus()[$data->status_is];
                }
            ],
            [
                'label'=>'用户组',
                'filter' => Html::activeDropDownList($adminSearch, 'group_id', \app\admin\models\AdminGroup::getSelectList(),['class' => 'form-control']),
                'attribute' => 'group_id',
                'value'=>function($data){
                    return $data->getGroupName();
                }
            ],

            // 'create_time:datetime',

            ['class' => 'app\admin\components\ActionColumn', 'buttons' => [
                'delete' => function ($url, $model) {
    if ($model->id != 1 ){
        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
            'title' => '删除', 'data-message' => '是否要删除此员工?'
        ]);
    }else{
        return null;
    }
                }
            ]],
        ],
    ]); ?>

</div>
        </div>
    </div>

    </div>
    </section>