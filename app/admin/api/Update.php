<?php

/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/3/24
 * Time: 上午9:25
 */

namespace app\admin\api;
use app\api\components\BaseApi;
class Update extends BaseApi
{

    protected function rules(){
        return [
          'phone'=>['type'=>'phone','required'=>true,'name'=>'手机号',"message"=>"请填写正确的手机号码"],
          'num'=>['type'=>'number','min'=>6,'max'=>12,'required'=>true,'name'=>'数量','message'=>'请填写正确的数字'],
        ];
    }
    public function run($params){
//        parent::check();

        return ["status"=>true,"message" => "hello".$params->num];
    }



}