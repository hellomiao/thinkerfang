<?php

/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/3/24
 * Time: 上午9:26
 */
namespace app\api\components;
use yii\base\Action;
use yii;
use app\base\lib\Validators;

abstract class BaseApi extends Action
{

   abstract protected function rules();

    public function check($params)
    {
       // TODO: Change the autogenerated stub
        $rules=$this->rules();
//
        $ret=[];
        foreach($rules as $key=>$val){
            $validators = new Validators();
            $validators->value=$params->$key;
            if($val['required']&&!isset($validators->value)) {
                $ret[] =['status'=>false,'message'=>"缺少必须参数[{$val['name']}-{$key}]"];
                break;
            }
            if(isset($val['min'])&&isset($val['max'])){

                $len = mb_strlen($validators->value);
                if($val['min']!=$val['max']){

                    if($len<$val['min']||$len>$val['max']){
                        $ret[] =['status'=>false,'message'=>"参数[{$val['name']}-{$key}]长度应大于{$val['min']},小于{$val['max']}"];
                        break;
                    }
                }else{

                    if($len!=$val['min']){

                        $ret[] =['status'=>false,'message'=>"参数[{$val['name']}-{$key}]长度应等于{$val['min']}"];
                        break;
                    }
                }
            }
            $validators->message=$val['message'];

                switch ($val['type']) {
                    case 'number':
                        $ret[] = $validators->number();
                        break;
                    case 'phone':
                        $ret[] = $validators->phone();
                        break;
                }

        }
        return $ret;

    }


}