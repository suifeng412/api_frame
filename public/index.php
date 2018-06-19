<?php

//use app\Logic\Test as TestLogic;
use core\Loader;

//命名空间
//自动加载
//错误处理

require __DIR__ . '/../core/start.php';

//$b = new TestLogic();
//var_dump($b);
//$c = new TestLogic();
//var_dump($c);

$cc = Loader::getInstance('app\Logic\Test');
var_dump($cc);
$dd = Loader::getInstance('app\Logic\Test');
var_dump($dd);

exit;
echo "<pre>";
print_r(CORE_PATH);
echo "<pre>";

echo 'this is api_frame';

echo "<pre>";
print_r($_SERVER);
echo "<pre>";
