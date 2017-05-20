<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\posts\models\PostsCategory */

$this->title = '添加分类';
$this->params['breadcrumbs'][] = ['label' => '分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body"

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div></div></div></div></section>
