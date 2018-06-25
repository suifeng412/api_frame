<?php
namespace app\controller;

use app\Logic\Test;
use core\Loader;
use core\Response;

class ActivityController{

    public function test(){
//        $testLogin = Loader::getInstance('/')
        $testLogin = new Test();
        $data = [
            'name' => '名字',
            'gender' => '1',
            'phone' =>  1412347654,
        ];
        Response::setJsonContent($data);
        Response::send();
    }

    /**
     * 这是默认方法
     */
    public function index()
    {
        echo 'index';
    }



}

