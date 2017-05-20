<?php

/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/3/23
 * Time: 下午2:59
 */
namespace app\api\controllers;


use yii;
use \JsonRpc2\Controller;

class DefaultController extends Controller
{


    public function actions()
    {

        $apis=Yii::$app->params['apis'];
        $class = $apis[$this->requestObject->method]['class'];
        return [
            $this->requestObject->method => [   //对应actionAbout这个action有效
                'class' => $class
            ],
        ];
    }


//    public function actionUpdate($message)
//    {
//        return ["message" => "hello ".$message];
//    }


}