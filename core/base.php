<?php

namespace core;

define('DS', DIRECTORY_SEPARATOR);  //定义路径分隔符
define('APP_PATH', __DIR__ . '/../app/');
defined('CORE_PATH') or define('CORE_PATH', __DIR__ . DS);  //**核心类文件 /core/


require CORE_PATH . 'Loader.php';







