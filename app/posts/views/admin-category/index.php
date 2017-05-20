<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">

    <p>
        <?= Html::a('添加分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [


            'id',

            [
              'label'=>'父级',
                'value'=>function($data){

                    return $data->getSelectList()[$data->parent_id];
                }
            ],
            'name',
            'desc',

            ['class' => 'app\admin\components\ActionColumn','template'=>'{update} {delete}', 'buttons' => [
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => '删除',
                    ]);
                }
            ]],
        ],
    ]); ?>
</div></div>
        </div>
    </div>
</section>
