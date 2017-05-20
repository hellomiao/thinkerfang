<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户组管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">

                    <p>
                        <?= Html::a('创建用户组', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'group_name',
                            [

                                'attribute' => 'status_is',
                                'value' => function ($data) {
                                    return \app\admin\models\Admin::getStatus()[$data->status_is];
                                }
                            ],
                            [
                                'attribute' => 'create_time',
                                'format' => ['date', 'php:Y-m-d H:i:s'],
                            ],

                            ['class' => 'app\admin\components\ActionColumn', 'template' => '{update} {set} {delete}', 'buttons' => [
                                'delete' => function ($url, $model) {
                                    if (!in_array($model->id,[1,2,3,4,5,6,7])) {
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                            'title' => '删除',
                                        ]);
                                    } else {
                                        return null;
                                    }
                                },
                                'set' => function ($url, $model) {
                                    if ($model->id != 1 && $model->id != 2) {
                                        return Html::a('<span class="glyphicon glyphicon-wrench"></span>', \yii\helpers\Url::to(['set-acl', 'id' => $model->id]), [
                                            'title' => '设置权限',
                                        ]);
                                    } else {
                                        return null;
                                    }
                                }
                            ],],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</section>
