<?php
namespace core;
class Bootstrap{
    public static function run(){
        //启动session
        session_start();
        //实现MVC,分析url
        self::parseUrl();
    }

    //分析url生成控制器和方法常量
    public static function parseUrl(){
        //dd($_SERVER);
        if(isset($_GET['s'])){
            //分析s变量生成控制器方法
            $info = explode("/",$_GET['s']);
            //ucfirst(string):将字符串的首字母切换为大写
            $class = '\web\controller\\'.ucfirst($info[0]);
            //dd($info);
            $action = $info[1];
        }else{
            $class = "\web\controller\Index";
            $action = "show";
        }
        //调用相应方法
        echo (new $class())->$action();
    }
}