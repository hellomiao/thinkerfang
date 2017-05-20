<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
    <p>
        <?= Html::a('添加会员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $userSearch,
        'columns' => [
            'id',
            'username',
            'mobile',
            [
                'label'=>'头像',
                'format'=>'raw',
                'value'=>function($data){

                    return Html::img(\app\user\models\User::getImgUrl($data->picture),['width'=>'50px']);
                }
            ],

            [
                'attribute' => 'last_login_time',
                'format' => ['date', 'yyyy-MM-dd H:i:s'],
            ],
            // 'status_is',
            // 'create_time:datetime',

            ['class' => 'app\admin\components\ActionColumn', 'template'=>'{update} {delete}','buttons' => [
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => '删除',
                    ]);
                }
            ]],
        ],
    ]); ?>
</div></div></div></div></section>
