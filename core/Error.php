<?php

namespace core;

class Error
{

    /**
     * 注册异常处理
     * @access public
     * @return void
     */
    public static function register()
    {
        error_reporting(E_ALL);
        set_error_handler([__CLASS__, 'appError']);
        set_exception_handler([__CLASS__, 'appException']);
        register_shutdown_function([__CLASS__, 'appShutdown']);
    }

    /**
     * 错误处理
     * @access public
     * @param  integer $errno      错误编号
     * @param  integer $errstr     详细错误信息
     * @param  string  $errfile    出错的文件
     * @param  integer $errline    出错行号
     * @return void
     * @throws ErrorException
     */
    public static function appError($errno, $errstr, $errfile = '', $errline = 0)
    {
        if ($errno === E_NOTICE) {
            return;
        }
        Log::info('file ' . $errfile . ' line ' . $errline . ' ' . $errstr, 'error', 'appError');
        Response::setJsonContent([
            'code' => -1,
            'errorMsg' => 'system error',
            'msg' => 'unknown error in server'
        ]);
        Response::send();
        exit;
    }

    /**
     * 异常处理
     * @access public
     * @param  $e 异常
     * @return void
     */
    public static function appException($e)
    {
        $error = [];
        $error['message'] = $e->getMessage();
        $trace = $e->getTrace();
        if ('E' == $trace[0]['function']) {
            $error['file'] = $trace[0]['file'];
            $error['line'] = $trace[0]['line'];
        } else {
            $error['file'] = $e->getFile();
            $error['line'] = $e->getLine();
        }
        Log::info('file ' . $error['file'] . ' line ' . $error['line'] . ' ' . $error['message'], 'error', 'appException');
        Response::setJsonContent([
            'code' => -1,
            'errorMsg' => 'system error',
            'msg' => 'unknown error in server'
        ]);
        Response::send();
        exit;
    }

    /**
     * 异常中止处理
     * @access public
     * @return void
     */
    public static function appShutdown()
    {
        if ($e = error_get_last()) {
            switch ($e['type']) {
                case E_ERROR:
                case E_PARSE:
                case E_CORE_ERROR:
                case E_COMPILE_ERROR:
                case E_USER_ERROR:
                    ob_end_clean();
                    Log::info('file ' . $e['file'] . ' line ' . $e['line'] . ' ' . $e['message'], 'error', 'appShutdown');
                    Response::setJsonContent([
                        'code' => -1,
                        'errorMsg' => 'system error',
                        'msg' => 'unknown error in server'
                    ]);
                    Response::send();
                    exit;
            }
        }
    }





}


