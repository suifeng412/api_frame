<?php

namespace core;



class App
{

    public static function run()
    {
        $requestObj = Loader::getInstance('core\Request');
        $requestObj->getRequestData();
        $controllerObj = Loader::getInstance('app\controller\\'.$requestObj->controller);
        $action = $requestObj->action;
        $controllerObj->$action();
    }




}


