<?php
/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/7/7
 * Time: 下午2:50
 */

namespace app\user\controllers;


use app\home\components\BaseController;
use app\user\models\LoginForm;
use app\user\models\User;
use app\user\models\UserToken;
use League\Flysystem\Exception;
use yii\widgets\ActiveForm;

class AjaxController extends BaseController
{


    public function actionSignup()
    {
        $user = new User();
        $trans = \Yii::$app->db->beginTransaction();

        try {


            if ($user->load(\Yii::$app->request->post())) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                if ($user->save()) {

                    $userTokenModel = new UserToken();
                    $userTokenModel->user_id = $user->id;
                    $userTokenModel->type = 0;
                    $userTokenModel->save();
                    $code = $userTokenModel->generateCode();
                    $res = \Yii::$app->mailer->compose('activate-account-html', ['code' => $code])
                        ->setTo($user->email)
                        ->setSubject('确认你的新账户')
                        ->send();

                    if ($res) {
                        $cookies2 = \Yii::$app->response->cookies;
                        $cookies2->add(new \yii\web\Cookie([
                            'name' => 'EMAIL',
                            'value' => $user->email,
                        ]));
                        //缓存激活码2小时
                        \Yii::$app->cache->set("ACTIVATECODE{$user->id}", $code, 7200);
                        $trans->commit();
                        return ['status' => true];
                    } else {
                        throw new Exception('邮件发送失败');
                        $ret['status'] = false;
                        $ret['message'] = '邮件发送失败';
                        throw new Exception('邮件发送失败');
                        return $ret;
                    }


                } else {
                    $msg = [];
                    foreach ($user->errors as $k => $v) {
                        $msg[$k] = implode(';', $v);
                    }
                    $ret['status'] = false;
                    $ret['message'] = $msg;
                    throw new Exception($msg);
                    return $ret;
                }
            }


        } catch (\Exception $e) {
            $ret['status'] = false;
            $ret['message'] = $e->getMessage();
            return $ret;
            $trans->rollBack();
        }
    }


    public function actionCheckEmail()
    {
        if (\Yii::$app->request->isPost) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $email = \Yii::$app->request->post('email');
            $isExists = User::find()->where(['email' => $email])->exists();
            if ($isExists) {
                return ['status' => true];
            }
            return ['status' => false];
        }
    }

    public function actionCheckUsername()
    {
        if (\Yii::$app->request->isPost) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $username = \Yii::$app->request->post('username');
            $isExists = User::find()->where(['username' => $username])->exists();
            if ($isExists) {
                return ['status' => true];
            }
            return ['status' => false];
        }
    }


    public function actionActivateAccount()
    {
        if (\Yii::$app->request->isPost) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }


    public function actionSignin()
    {
        $model = new LoginForm();
        if (\Yii::$app->request->isPost && \Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $ret = [];
            if ($model->load(\Yii::$app->request->post()) && $model->login()) {

                $ret['status'] = true;
                $ret['username'] = \Yii::$app->user->identity->username;
            } else {
                $msg = '';
                foreach ($model->errors as $k => $v) {
                    $msg .= $v[0];
                }
                $ret['status'] = false;
                $ret['message'] = $msg;

            }

            return $ret;
        }
    }

    public function actionPasswordReset()
    {
        if (\Yii::$app->request->isPost && \Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $username = \Yii::$app->request->post('username');

            $userRow = User::find()->where(['status_is' => User::STATUS_ACTIVE])->orWhere(['email' => $username, 'username' => $username])->one();

            $userTokenModel = new UserToken();
            $userTokenModel->user_id = $userRow->id;
            $userTokenModel->type = 1;
            $userTokenModel->save();
            $code = $userTokenModel->generateCode();
            $res = \Yii::$app->mailer->compose('password-reset-html', ['code' => $code])
                ->setTo($userRow->email)
                ->setSubject('密码重置')
                ->send();
            if ($res) {
                \Yii::$app->cache->set("ACTIVATECODEPWD{$userRow->id}", $code, 7200);
                return ['status' => true,'email'=>$userRow->email];
            }

            return ['status' => false];


        }
    }

}