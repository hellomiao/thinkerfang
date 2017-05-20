<?php
/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/7/7
 * Time: 下午6:52
 */

namespace app\user\controllers;


use app\home\components\BaseController;
use app\user\models\User;
use app\base\lib\avatar\MDAvatars;

class AccountController extends BaseController
{
    public function actionActivateAccount()
    {
        $code_get = \Yii::$app->request->get('code');
        $code = base64_decode($code_get);
        $user_id = substr($code, 32, 1);
        $key = "ACTIVATECODE{$user_id}";
        $cookies = \Yii::$app->response->cookies;
        $code_redis = \Yii::$app->cache->get($key);
        $flag = false;
        if ($code_get == $code_redis) {
            User::updateAll(['status_is' => 'Y'], ['id' => $user_id]);
            \Yii::$app->cache->delete($key);
            $cookies->remove('EMAIL');
            $flag = true;
        }

        return $this->render('activate-account', ['flag' => $flag]);


    }

    public function actionAccountCreated()
    {

        $cookies1 = \Yii::$app->request->cookies;

        $email = $cookies1['EMAIL'];

        return $this->render('account-created', ['email' => $email]);

    }


    public function actionPasswordReset()
    {

        $set = false;
        $flag = false;
        if (\Yii::$app->request->isPost) {

            $password = \Yii::$app->request->post('password');
            $user_id = \Yii::$app->request->post('user_id');

            $user = User::findOne($user_id);

            $user->password = $user->hashPassword($password);


            if ($user->save(false)) {
                $set = true;
                $key = "ACTIVATECODEPWD{$user_id}";
                \Yii::$app->cache->delete($key);
            }


        } else {
            $code_get = \Yii::$app->request->get('code');
            $code = base64_decode($code_get);
            $user_id = substr($code, 32, 1);
            $key = "ACTIVATECODEPWD{$user_id}";
            $code_redis = \Yii::$app->cache->get($key);
            $flag = false;
            if ($code_get == $code_redis) {
                $flag = true;
            }

        }


        return $this->render('password-reset', ['flag' => $flag, 'user_id' => $user_id, 'set' => $set]);


    }


    public function actionAvatar()
    {
        $username = \Yii::$app->request->get('username');
        $user = User::find()->where(['username' => $username])->exists();
        if (!$user) {
            die('非法访问');
        }
        $size = \Yii::$app->request->get('size');
        $outputSize = $size ? $size : 240;
        $dir = \Yii::$app->imgUpload->getSaveDir();
        $file = $dir . "/avatar/{$username}/{$outputSize}.png";
        $path = $dir. "/avatar/{$username}/";
        if (!file_exists($file)) {
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $Avatar = new MDAvatars($username, 512);
            $Avatar->Output2Browser($outputSize);
            $Avatar->Save($path . '240.png', 240);
            $Avatar->Save($path . '90.png', 90);
            $Avatar->Save($path . '64.png', 64);
            $Avatar->Free();

        } else {
            $image = file_get_contents($file);
            session_start();
            header("cache-control: private, max-age=10800, pre-check=10800");
            header("pragma: private");
            header("expires: " . date(date_rfc822, strtotime(" 2 day")));
            header('Content-type: image/png');
            echo $image;

        }


    }
}