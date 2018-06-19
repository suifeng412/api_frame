<?php
namespace core;

class Loader
{
    //命名空间路径映射
    private static $namespace = [];
    private static $objs = [];

    public static function register($autoload = null)
    {
        // 注册系统自动加载
        spl_autoload_register($autoload ?: 'core\\Loader::autoload', true, true);

        // 注册命名空间定义
        self::addNamespace([
            'core'  => CORE_PATH,
            'app'   => APP_PATH,
        ]);
    }


    /**
     * 注册命名空间
     * @access public
     * @param  array $namespace 命名空间
     * @return void
     */
    private static function addNamespace($namespace)
    {
        if(is_array($namespace)) {
            foreach ($namespace as $prefix => $path) {
                //[core] => path
                self::$namespace[$prefix] = $path;
            }
        }
    }




    /**
     * 自动加载
     * @access public
     * @param  string $class 类名
     * @return bool
     */
    private static function autoload($class)
    {
        if( !empty($class) && self::$namespace) {
            $classPath = self::findClass($class);
            if($classPath){
                require $classPath;

            }

        }
        return false;
    }

    /**
     * 查找类文件是否存在
     * @access private
     * @param $class
     * @return string
     */
    private static function findClass($class)
    {
        $filePath = '';
        $arr = explode('\\', $class);
        if( !empty($arr[0]) && isset(self::$namespace[$arr[0]])) {
            $rootPath = self::$namespace[$arr[0]];
            unset($arr[0]);
            $filePath = $rootPath.implode('/', $arr).'.php';
            if(!is_file($filePath))
                $filePath = '';
        }
        return $filePath;
    }


    /**
     * 获取实例对象（单例模式）
     * @param $class
     * @return mixed
     */
    public static function getInstance($class)
    {
        if(!isset(self::$objs[$class]))
            self::$objs[$class] = new $class;
        return self::$objs[$class];
    }


}



