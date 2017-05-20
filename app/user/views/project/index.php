<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
    <p>
        <?= Html::a('行业分类', ['/cms/category/index','type'=>4], ['class' => 'btn btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'user_id',
            'name',
            [
                'label'=>'图片',
                'format'=>'raw',
                'value'=>function($data){

                    return Html::img(\app\user\models\Project::getImgUrl($data->picture),['width'=>'50px']);
                }
            ],
            // 'category_id',
            [
                'attribute' => 'category_id',
                'value'=>function($data){

                    return $data->category->name;
                }
            ],
            // 'team',
            // 'info:ntext',
            // 'content:ntext',
            // 'create_time:datetime',
            [
                'attribute' => 'create_time',
                'format' => ['date', 'yyyy-MM-dd H:i:s'],
            ],

            [
                'attribute' => 'step',
                'value'=>function($data){

                    return \app\user\models\Project::$stepArr[$data->step];
                }
            ],

            ['class' => 'app\admin\components\ActionColumn', 'buttons' => [
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => '删除',
                    ]);
                },
                'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', \yii\helpers\Url::to(['/project_'.$model->id]), ['target'=>'_blank'

                    ]);
                }
            ]],
        ],
    ]); ?>
</div></div></div></div></section>
