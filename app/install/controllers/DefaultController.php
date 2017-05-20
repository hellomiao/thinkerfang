<?php

/**
 * Created by PhpStorm.
 * User: yangchunrun
 * Date: 16/3/21
 * Time: 下午4:05
 */

namespace app\install\controllers;

use yii\web\Controller;

//use app\admin\components\BaseController;
//use app\admin\models\User;
//use yii\web\Controller;
use yii;

class DefaultController extends Controller
{

    public $layout = '@app/install/views/layouts/main.php';

    public $dbname = 'data.sql';


    public function actionIndex()
    {


        @set_time_limit(1000);
        date_default_timezone_set('PRC');
        error_reporting(E_ALL & ~E_NOTICE);
        header('Content-Type: text/html; charset=utf-8');


        define('SITEDIR', Yii::getAlias('@webroot') . '/');

        if (file_exists(SITEDIR . 'data/install.lock') == true) {

            return $this->render('lock');
        }


        if (!file_exists(SITEDIR . "common/config/dbconfig.php")) {

            copy(SITEDIR . "app/install/source/sql/config-template.php", SITEDIR . "common/config/dbconfig.php");

        }


        if (phpversion() <= '5.3.0')
            set_magic_quotes_runtime(0);
        if ('5.2.0' > phpversion())
            exit('您的php版本过低，不能安装本软件，请升级到5.2.0或更高版本再安装，谢谢！');


//        define("VERSION", date('Y-m-d') . 'http://wemall.duapp.com');
        $sqlFile = $this->dbname;
//        echo SITEDIR . 'app/install/source/sql/' . $sqlFile;
        if (!file_exists(SITEDIR . 'app/install/source/sql/' . $sqlFile)) {
            echo '缺少数据库文件!';
            exit;
        }

//        $fp = fopen(SITEDIR . "common/config/dbconfig.php", "w");
//        unset($fp);

        $request = Yii::$app->request;
        $step = $request->get('step', 1);
        if ($step == '2') {
            if (phpversion() < 5) {
                die('本系统需要PHP5+MYSQL >=4.1环境，当前PHP版本为：' . phpversion());
            }
            $phpv = @ phpversion();
            $os = PHP_OS;
            $os = php_uname();
            $tmp = function_exists('gd_info') ? gd_info() : array();
            $server = $_SERVER["SERVER_SOFTWARE"];
            $host = (empty($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_HOST"] : $_SERVER["SERVER_ADDR"]);
            $name = $_SERVER["SERVER_NAME"];
            $max_execution_time = ini_get('max_execution_time');
            $allow_reference = (ini_get('allow_call_time_pass_reference') ? '<font color=green>[√]On</font>' : '<font color=red>[�]Off</font>');
            $allow_url_fopen = (ini_get('allow_url_fopen') ? '<font color=green>[√]On</font>' : '<font color=red>[�]Off</font>');
            $safe_mode = (ini_get('safe_mode') ? '<font color=red>[�]On</font>' : '<font color=green>[√]Off</font>');

            $err = 0;
            if (empty($tmp['GD Version'])) {
                $gd = '<font color=red ;><b>[X]Off</b></font>';
                $err++;
            } else {
                $gd = '<font color=green>[√]On</font> ' . $tmp['GD Version'];
            }
            if (function_exists('mysql_connect')) {
                $mysql = '<span class="correct_span">√</span> 已安装';
            } else {
                $mysql = '<span class="correct_span error_span">√</span> 出现错误';
                $err++;
            }
            if (ini_get('file_uploads')) {
                $uploadSize = '<span class="correct_span">√</span> ' . ini_get('upload_max_filesize');
            } else {
                $uploadSize = '<span class="correct_span error_span">√</span>禁止上传';
            }
            if (function_exists('session_start')) {
                $session = '<span class="correct_span">√</span> 支持';
            } else {
                $session = '<span class="correct_span error_span">√</span> 不支持';
                $err++;
            }
            $folder = array('/', 'app', 'common', 'console', 'vendor', 'data');

            $data = ['folder' => $folder, 'os' => $os, 'phpv' => $phpv, 'mysql' => $mysql, 'uploadSize' => $uploadSize, 'session' => $session, 'gd' => $gd];
            return $this->render('s1', $data);
        } elseif ($step == '3') {

            $testdbpwd = $request->get('testdbpwd');

            if ($testdbpwd) {
//
//
                $dbHost = $request->post('dbHost');
                $dbPort = $request->post('dbPort');
                $dbUser = $request->post('dbUser');
                $dbPwd = $request->post('dbPwd');
                try {
                    $pdo = @new \PDO("mysql:host={$dbHost};port={$dbPort}", $dbUser, $dbPwd);
                    return true;
                } catch (Exception $e){
                    return false;
                }


            }

            return $this->render('s2');
        } elseif ($step == '4') {
            if (file_exists(SITEDIR . 'data/install.lock') == true) {
                return $this->render('lock');
            }
            if ($request->get('install') == '1') {
                $dbHost = $request->post('dbhost');
                $dbPort = $request->post('dbport');
                $dbName = $request->post('dbname');
                $dbHost = empty($dbPort) || $dbPort == 3306 ? $dbHost : $dbHost . ':' . $dbPort;
                $dbUser = $request->post('dbuser');
                $dbPwd = $request->post('dbpw');
                $dbPrefix = $request->post('dbprefix', 'w_');
                $username = trim($request->post('manager_email'));
                $password = md5(trim($request->post('manager_pwd')));
                $config = array();
                $config['DB_TYPE'] = 'mysql';
                $config['DB_HOST'] = $dbHost;
                $config['DB_NAME'] = $dbName;
                $config['DB_USER'] = $dbUser;
                $config['DB_PWD'] = $dbPwd;
                $config['DB_PORT'] = $dbPort;
                $config['DB_PREFIX'] = $dbPrefix;
//                var_dump($username);
//                var_dump($password);
                $conn = @ mysql_connect($dbHost, $dbUser, $dbPwd);
                mysql_query("set names 'utf8'");
                //创建数据库
                if (!mysql_select_db($dbName, $conn)) {
                    mysql_query("CREATE DATABASE IF NOT EXISTS `" . $dbName . "` DEFAULT CHARACTER SET utf8;", $conn);
                }
                mysql_select_db($dbName, $conn);
                //读取数据文件
                $sqldata = file_get_contents(SITEDIR . 'app/install/source/sql/' . $this->dbname);
//                var_dump($sqldata);exit();
                //注意把数据库表前缀改为dbprefix_
                $sqldata = str_replace('dbprefix_', $dbPrefix, $sqldata);
                $sqlFormat = $this->sql_split($sqldata, $dbPrefix);
                //创建配置文件
                $fp = fopen(SITEDIR . "app/install/source/sql/config-template.php", "r");
                $configStr1 = fread($fp, filesize(SITEDIR . "app/install/source/sql/config-template.php"));
                fclose($fp);

                $configStr1 = str_replace("db_host", $dbHost, $configStr1);   //初始化数据库服务器
                $configStr1 = str_replace("db_name", $dbName, $configStr1);       //初始化数据库名字
                $configStr1 = str_replace("db_user", $dbUser, $configStr1);           //初始化数据库用户名
                $configStr1 = str_replace("db_pwd", $dbPwd, $configStr1);         //初始化数据库密码
                $configStr1 = str_replace("db_prefix", $dbPrefix, $configStr1);           //初始化数据库表前缀
                //写到Yii配置文件
                $fp = fopen(SITEDIR . "common/config/dbconfig.php", "w");
                fwrite($fp, $configStr1);
                fclose($fp);

                /**
                 * 执行SQL语句
                 */
                $counts = count($sqlFormat);

                for ($i = 0; $i < $counts; $i++) {
                    $sql = trim($sqlFormat[$i]);

                    if (strstr($sql, 'CREATE TABLE')) {
                        preg_match('/CREATE TABLE IF NOT EXISTS `([^ ]*)`/', $sql, $matches);
                        mysql_query("DROP TABLE IF EXISTS `$matches[1]");
                        mysql_query($sql);
                    } else {
                        mysql_query($sql);
                    }
                }
                //插入管理员
                $time = date('Y/m/d H:i:s');
                $dbPrefixadmin = $dbPrefix . 'admin';

                $query = "INSERT INTO `$dbPrefixadmin` (`id`, `username`, `password`, `time`) VALUES (2, \"$username\", \"$password\", \"$time\")";

                mysql_query($query);
            }
            @touch(SITEDIR . 'data/install.lock');
            return $this->render('s3');
        }

        return $this->render('index');
    }

    protected function sql_split($sql, $tablepre)
    {

        if ($tablepre != "www_")
            $sql = str_replace("www_", $tablepre, $sql);
        $sql = preg_replace("/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/", "ENGINE=\\1 DEFAULT CHARSET=utf8", $sql);

        if ($r_tablepre != $s_tablepre)
            $sql = str_replace($s_tablepre, $r_tablepre, $sql);
        $sql = str_replace("\r", "\n", $sql);
        $ret = array();
        $num = 0;
        $queriesarray = explode(";\n", trim($sql));
        unset($sql);
        foreach ($queriesarray as $query) {
            $ret[$num] = '';
            $queries = explode("\n", trim($query));
            $queries = array_filter($queries);
            foreach ($queries as $query) {
                $str1 = substr($query, 0, 1);
                if ($str1 != '#' && $str1 != '-')
                    $ret[$num] .= $query;
            }
            $num++;
        }
        return $ret;
    }

}
