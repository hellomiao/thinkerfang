<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\user\models\Project */

$this->title = '更新项目[' . $model->name.']';
$this->params['breadcrumbs'][] = ['label' => '项目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = '更新';
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div></div></div></div></section>
