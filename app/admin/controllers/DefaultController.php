<?php

/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/3/21
 * Time: 下午4:05
 */
namespace app\admin\controllers;

use app\admin\models\Admin;
use app\base\models\Config;
use app\admin\models\LoginForm;

use app\base\lib\Utils;
use app\base\models\UploadForm;
use app\project\models\Project;
use app\project\models\ProjectDetail;
use app\project\models\Tree;
use yii;
use app\admin\components\BaseController;
use yii\helpers\Url;
use app\api\components;

class DefaultController extends BaseController
{
    public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionIndex()
    {


        return $this->render('index');
    }

    public function actionLogin()
    {

        $model = new LoginForm();
//        $a = new Admin();
//        echo $a->hashPassword('123456','251aab');
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect(['msg/index']);
        }

        if (!Yii::$app->adminUser->isGuest) {
            $this->redirect(['msg/index']);
        }
        return $this->render('login', ['model' => $model]);
    }


    public function actionLogout()
    {

        if (Yii::$app->adminUser->logout()) {
            $this->redirect(['login']);
        }
    }

    public function actionError()
    {
        return $this->render('error');
    }


    public function actionConfig()
    {
        $config = new Config();
        if (Yii::$app->request->isPost && $this->commit) {
            $siteName = Yii::$app->request->post('site-name');
            $siteInfo = Yii::$app->request->post('site-info');
            $uploadForm = new UploadForm();
            $img = Yii::$app->imgUpload->UploadPhoto($uploadForm, 'file');

            if ($img['status'] && $img['message']) {
                $config->updateAll(['data' => $img['message']], ['name' => 'site-logo']);

            }

            $config->updateAll(['data' => $siteName], ['name' => 'site-name']);

            $config->updateAll(['data' => $siteInfo], ['name' => 'site-info']);

            $msg = "更新站点设置成功";
            Utils::adminLog('update', $msg);
            return ['status' => true, 'message' => $msg];
        } else {
            return $this->render('config', ['config' => $config]);
        }
    }




}