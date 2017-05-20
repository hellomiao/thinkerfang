<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\user\models\User */

$this->title = '添加会员';
$this->params['breadcrumbs'][] = ['label' => '会员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
