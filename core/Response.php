<?php

namespace core;

class Response
{

    private static $content = null;

    /**
     * 设置json返回格式
     * @param $data
     */
    public static function setJsonContent($data)
    {
        header('Content-type: application/json');
        self::$content = json_encode($data);
    }


    public static function send()
    {
        if(!empty(self::$content)){
            echo self::$content;
        }else{
            echo json_encode(
                [
                    'code' => -1,
                    'errorMsg' => 'system error',
                    'msg' => 'unknown error in server'
                ]
            );
        }
        die();
    }



}





