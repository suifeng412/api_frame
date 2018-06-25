<?php

//use app\Logic\Test as TestLogic;
use core\Loader;
use core\Log;

//命名空间
//自动加载
//错误处理

require __DIR__ . '/../core/start.php';

$a = new \app\controller\ActivityController();

$b = new \app\controller\ActivityController();

var_dump($a);
echo "<pre>";
var_dump($b);
echo "<pre>";
var_dump(new \app\controller\ActivityController());
var_dump(new \app\controller\ActivityController());exit;

//$b = new TestLogic();
//var_dump($b);
//$c = new TestLogic();
//var_dump($c);

//$cc = Loader::getInstance('app\Controller\ActivityController');
//var_dump($cc);exit;
//$dd = Loader::getInstance('app\Logic\Test');
//var_dump($dd);

//Log::info('6666666','eee');






echo 'this is api_frame';

echo "<pre>";
print_r($_SERVER);
echo "<pre>";
