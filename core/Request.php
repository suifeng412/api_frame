<?php

namespace core;

class Request
{
    // 控制器
    public $controller = '';
    // 方法
    public $action = '';
    // get参数
    public $getData = null;
    // post数据
    public $postData = null;

    public function getRequestData()
    {
        $requestData = $_SERVER;
        preg_match('/^\/(?P<uri>(\w*\/?)*)\??(?P<args>.*)/i', $requestData['REQUEST_URI'], $urlArr);
        if(!empty($urlArr['uri'])){
            $uriArr = explode('/', $urlArr['uri']);
            $uriArr = array_filter($uriArr);
            $this->controller = $uriArr[0]??'index';
            $this->action = $uriArr[1]??'index';
        }
        $this->getData = $_GET;
    }


    public function getData()
    {
        return $this->getData;
    }

    public function postData()
    {
        return $this->postData;
    }


}

