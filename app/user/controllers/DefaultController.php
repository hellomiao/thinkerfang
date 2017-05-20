<?php

namespace app\user\controllers;

use app\base\lib\Utils;
use app\user\components\AuthController;
use app\user\models\User;



/**
 * Default controller for the `user` module
 */
class DefaultController extends AuthController
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $user = User::findOne($this->uid);

        return $this->render('index', ['user' => $user]);
    }


    public function actionSetpassword()
    {
        if (\Yii::$app->request->isPost) {

            $user = new User();
            $model = $user->findOne($this->uid);
            $oldpassword = \Yii::$app->request->post('oldpassword');
            $password = \Yii::$app->request->post('password');
            $password1 = \Yii::$app->request->post('password1');
            if (!$model->validatePassword($oldpassword)) {
                return $this->error('原密码错误!');
            }
            if ($password != $password1) {
                return $this->error('两次密码输入不一致!');
            }

            if (!Utils::isPwd($password)) {

                return $this->error('密码格式不正确,长度6~16!');
            }

            $model->password = $user->hashPassword($password, $model->hash);
            if ($model->save()) {
                \Yii::$app->user->logout();
                return $this->success('密码修改成功请重写登录!', ['/signin']);
            }

        } else {
            return $this->render('setpassword');
        }

    }


    public function actionLogout()
    {
        if (\Yii::$app->user->logout()) {
            $this->redirect(\Yii::$app->getHomeUrl());
        }
    }


}
