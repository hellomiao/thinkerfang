<?php
/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/3/24
 * Time: 下午4:49
 */

namespace app\api\components;

use yii;
class Rpc
{

    public static function call($method,$params=array()){
        $data = array("method"=>$method,"sign_type"=>"MD5",
            "timestamp"=>time(),"params"=>$params);
        $token = Yii::$app->params['token'];
        $sign = Validate::sign($data,$token);
        $data['sign']=$sign;
        $data_string = json_encode($data);
        $ch = curl_init(Yii::$app->request->hostInfo.'/api');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );

        $result = curl_exec($ch);
        return json_decode($result,true);
    }
}