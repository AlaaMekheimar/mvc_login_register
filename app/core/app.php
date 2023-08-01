<?php
namespace MVC\core;
class app{
    private $controller;
    private $method;
    private $param=[];

    public function __construct()
    {
        $this->url();
        $this->render();
    }
    private function url(){
         if(!empty($_SERVER['QUERY_STRING'])){
            $url = explode("/",$_SERVER['QUERY_STRING']);
            $this->controller= isset($url[0])? $url[0]."controller":null;
            $this->method= isset($url[1])? $url[1]:"not exist";

            unset ($url[0],$url[1]);
            $this->param= array_values($url);
         }else{
            $this->controller= "ErrorController";
            $this->method = "method not exist";
         }
    }
    private function render(){
        $controller = "MVC\controllers\\".$this->controller;
        if(class_exists($controller)){
             $controller= new $controller;
             if(method_exists($controller,$this->method)){
                  call_user_func_array([$controller,$this->method],$this->param);
             }else{
                echo "method not exist";
             }
        }else{
            echo "class not exist";
        }
    }
}