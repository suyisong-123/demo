<?php
namespace web\controller;
//导入View命名空间
use core\View;
//导入验证码类
use Gregwar\Captcha\CaptchaBuilder;
class Index{
    //保存视图层对象
    protected $view;
    //产生一个视图层对象
    public function __construct()
    {
        $this->view = new View();
    }

    //对象的方法执行，执行一个视图操作
    public function show(){
        return $this->view->make('index')->with('version','1.0');
    }
    public function login(){
        dd1($_SESSION);
        //登录界面
        return $this->view->make('login');
    }
    public function code()
    {
        header('Content-type: image/jpeg');
        //建立一个验证码
        $builder = new CaptchaBuilder;
        $builder->build(100, 30);
        //保存到$_SESSION当中
        $_SESSION['phrase'] = $builder->getPhrase();
        //输出验证码
        $builder->output();
    }
}
