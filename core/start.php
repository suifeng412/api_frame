<?php

namespace core;

define('DS', DIRECTORY_SEPARATOR);  //定义路径分隔符
define('APP_PATH', __DIR__ . '/../app/');
define('LOG_PATH', __DIR__ . '/../log/');   //设置log目录写权限权限
defined('CORE_PATH') or define('CORE_PATH', __DIR__ . DS);  //**核心类文件 /core/


require CORE_PATH . 'Loader.php';

Loader::register();

Error::register();

App::run();


