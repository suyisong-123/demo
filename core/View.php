<?php
namespace  core;
//视图层模板
class View{
    //模板文件
    protected $file;
    //模板变量
    protected $vars = [];
    //获得模板文件
    public function make($filename){
        //文件路径
        $this->file = "view/".$filename.".html";
        return $this;
    }

    //得到模板变量
    public function with($name, $value){
        $this->vars["$name"] = $value;
        return $this;
    }

    //直接输出对象时引用包含该文件
    public function __toString()
    {
        //把数组中的变量分配到内存变量中
        extract($this->vars);
        // TODO: Implement __toString() method.
        include $this->file;
        return '';
    }
}