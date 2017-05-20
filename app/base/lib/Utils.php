<?php

/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/3/24
 * Time: 下午3:35
 */
namespace app\base\lib;
use app\admin\models\AdminLogger;

class Utils
{
    public static function objectToArray($stdclassobject)
    {
        $_array = is_object($stdclassobject) ? get_object_vars($stdclassobject) : $stdclassobject;

        foreach ($_array as $key => $value) {
            $value = (is_array($value) || is_object($value)) ? Utils::objectToArray($value) : $value;
            $array[$key] = $value;
        }

        return $array;
    }

   public static function is_json($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public static function xmp($data,$isExit=false){

        echo '<xmp>';
        print_r($data);
        echo '</xmp>';

        if($isExit)
            exit;
    }

    //添加日志
    public static function adminLog($type, $intro, $uid = 0)
    {

        $uid = \Yii::$app->adminUser->id?\Yii::$app->adminUser->id:$uid;
        $logger = new AdminLogger();
        $currentUrl = \Yii::$app->request->getUrl();
        $userIP = \Yii::$app->request->userIP;
        $data = array('user_id' => $uid, 'catalog' => $type, 'url' => $currentUrl, 'intro' => $intro, 'ip' =>$userIP, 'create_time' => time());
        $logger->attributes = $data;
        $logger->save();
    }


    public static function getTree($categorys)

    {
        $id            = 0;
        $level         = 0;
        $categoryObjs  = array();
        $tree          = array();
        $childrenNodes = array();
        foreach ($categorys as $cate)
        {
            $obj               = new stdClass();
            $obj->root         = $cate;
            $id                = $cate['id'];
            $level             = $cate['parent_id'];
            $obj->children     = array();
            $categoryObjs[$id] = $obj;
            if ($level)
            {
                $childrenNodes[] = $obj;
            }
            else
            {
                $tree[] = $obj;
            }
        }



        foreach ($childrenNodes as $node)
        {
            $cate                             = $node->root;
            $id                               = $cate['id'];
            $level                            = $cate['parent_id'];
            $categoryObjs[$level]->children[] = $node;
        }

        return $tree;
    }


    public static function sendSms($telphone,$message){
        $res=[];
        $uid = \Yii::$app->params['smsUid'];
        $passwd = \Yii::$app->params['smsPasswd'];
        $message = iconv('UTF-8', 'GB2312', $message);
        $gateway = "http://mb345.com:999/ws/batchSend2.aspx?CorpID={$uid}&Pwd={$passwd}&Mobile={$telphone}&Content={$message}&Cell=&SendTime=";

        $result = file_get_contents($gateway);

        if(  $result >0 )
        {
            $res['status']=true;
        }else{
            $res['status']=false;
            $res['message']=$result;
        }

        return $res;

    }

    public static function isNames($value, $minLen=2, $maxLen=20, $charset='ALL'){
        if(empty($value))
            return false;
        switch($charset){
            case 'EN': $match = '/^[_\w\d]{'.$minLen.','.$maxLen.'}$/iu';
                break;
            case 'CN':$match = '/^[_\x{4e00}-\x{9fa5}\d]{'.$minLen.','.$maxLen.'}$/iu';
                break;
            default:$match = '/^[_\w\d\x{4e00}-\x{9fa5}]{'.$minLen.','.$maxLen.'}$/iu';
        }
        return preg_match($match,$value);
    }

    /**
     * 验证密码
     * @param string $value
     * @param int $length
     * @return boolean
     */
    public static function isPwd($value,$minLen=6,$maxLen=16){
        $match='/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]{'.$minLen.','.$maxLen.'}$/';
        $v = trim($value);
        if(empty($v))
            return false;
        return preg_match($match,$v);
    }

    /**
     * 验证eamil
     * @param string $value
     * @param int $length
     * @return boolean
     */
    public static function isEmail($value,$match='/^[\w\d]+[\w\d-.]*@[\w\d-.]+\.[\w\d]{2,10}$/i'){
        $v = trim($value);
        if(empty($v))
            return false;
        return preg_match($match,$v);
    }

    /**
     * 验证电话号码
     * @param string $value
     * @return boolean
     */
    public static function isTelephone($value,$match='/^0[0-9]{2,3}[-]?\d{7,8}$/'){
        $v = trim($value);
        if(empty($v))
            return false;
        return preg_match($match,$v);
    }

    /**
     * 验证手机
     * @param string $value
     * @param string $match
     * @return boolean
     */
    public static function isMobile($value,$match='/^[(86)|0]?(13\d{9})|(15\d{9})|(18\d{9})$/'){
        $v = trim($value);
        if(empty($v))
            return false;
        return preg_match($match,$v);
    }
    /**
     * 验证邮政编码
     * @param string $value
     * @param string $match
     * @return boolean
     */
    public static function isPostcode($value,$match='/\d{6}/'){
        $v = trim($value);
        if(empty($v))
            return false;
        return preg_match($match,$v);
    }
    /**
     * 验证IP
     * @param string $value
     * @param string $match
     * @return boolean
     */
    public static function isIP($value,$match='/^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$/'){
        $v = trim($value);
        if(empty($v))
            return false;
        return preg_match($match,$v);
    }

    /**
     * 验证身份证号码
     * @param string $value
     * @param string $match
     * @return boolean
     */
    public static function isIDcard($value,$match='/^\d{6}((1[89])|(2\d))\d{2}((0\d)|(1[0-2]))((3[01])|([0-2]\d))\d{3}(\d|X)$/i'){
        $v = trim($value);
        if(empty($v))
            return false;
        else if(strlen($v)>18)
            return false;
        return preg_match($match,$v);
    }

    /**
     * *
     * 验证URL
     * @param string $value
     * @param string $match
     * @return boolean
     */
    public static function isURL($value,$match='/^(http:\/\/)?(https:\/\/)?([\w\d-]+\.)+[\w-]+(\/[\d\w-.\/?%&=]*)?$/'){
        $v = strtolower(trim($value));
        if(empty($v))
            return false;
        return preg_match($match,$v);
    }

    /*
    utf-8编码下截取中文字符串,参数可以参照substr函数
    @param $str 要进行截取的字符串
    @param $start 要进行截取的开始位置，负数为反向截取
    @param $end 要进行截取的长度
*/
    public static  function utf8_substr($str,$start=0) {
        if(empty($str)){
            return false;
        }
        if (function_exists('mb_substr')){
            if(func_num_args() >= 3) {
                $end = func_get_arg(2);
                return mb_substr($str,$start,$end,'utf-8');
            }
            else {
                mb_internal_encoding("UTF-8");
                return mb_substr($str,$start);
            }

        }
        else {
            $null = "";
            preg_match_all("/./u", $str, $ar);
            if(func_num_args() >= 3) {
                $end = func_get_arg(2);
                return join($null, array_slice($ar[0],$start,$end));
            }
            else {
                return join($null, array_slice($ar[0],$start));
            }
        }
    }


}