<?php

namespace core;

class Log
{

    //日志文件根目录
    private static $_rootPath = LOG_PATH;

    //日志文件名
    private static $_dirName = 'Ymd';


    public static function info($msg, $fileName='')
    {
        !empty($fileName)?$fileName = 'info'.'_'.$fileName:$fileName = 'info';
        return self::save($msg, $fileName);
    }

    public static function warn($msg, $fileName='')
    {
        !empty($fileName)?$fileName = 'warn'.'_'.$fileName:$fileName = 'warn';
        return self::save($msg, $fileName);
    }

    public static function error($msg, $fileName=''){
        !empty($fileName)?$fileName = 'error'.'_'.$fileName:$fileName = 'error';
        return self::save($msg, $fileName);
    }


    /**
     * 保存日志信息
     * @param $msg
     * @param $fileName
     * @return bool|int
     */
    private static function save($msg, $fileName)
    {
        // 获取日志文件
        $logFile = self::getLogFile($fileName);

        // 创建日志目录
        $isCreate = self::createLogPath(dirname($logFile));

        // 日志内容
        $logData = sprintf('[%s] %s'.PHP_EOL, date('Y-m-d H:i:s'), $msg);

        // 写入日志文件
        if($isCreate){
            return file_put_contents($logFile, $logData, FILE_APPEND);
        }

        return false;
    }


    /**
     * 获取日志文件路径
     * @param $fileName
     * @return string
     */
    private static function getLogFile($fileName)
    {
        return sprintf("%s/%s/%s", self::$_rootPath, date(self::$_dirName), $fileName.'.log');
    }

    /**
     * 创建日志目录
     * @param $logPathDir
     * @return bool
     */
    private static function createLogPath($logPathDir)
    {
        if(!is_dir($logPathDir)){
            return mkdir($logPathDir, 0777, true);
        }
        return true;
    }


}
