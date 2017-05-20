<?php
$path=dirname(dirname(__DIR__)).'/app/';
$filesnames = scandir($path);
$modules['gii']= [
    'class' => 'yii\gii\Module',
];
//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames

//print_r ($filesnames);

foreach ($filesnames as $name) {

    if(is_dir($path.$name)&&$name!='.'&&$name!='..') {
        $modules[$name] = "app\\{$name}\\Module";

    }

}

return $modules;
