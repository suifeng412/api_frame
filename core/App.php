<?php

namespace core;


class App
{


    public static function run()
    {
        $requestObj = Loader::getInstance('core\Request');
        $requestObj->getRequestData();
    }




}


