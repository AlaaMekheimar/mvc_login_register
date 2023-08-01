<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\session;
use MVC\models\usermodel;
use Rakit\Validation\Validator;

class usercontroller extends controller{
    private $objUserModel;
    function __construct()
    {
        $this->objUserModel= new usermodel();
        session::start();
    }
   public function login(){
       $this->view("user/login",['title'=>"login"]);
   }
   public function register(){
    $this->view("user/register",['title'=>"register"]);
   }
   function postlogin(){
    if (isset($_POST['login'])){
        $validator = new Validator;
       
             $validation = $validator->make($_POST, [
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
             ]);
             $validation->validate();
             $validation->fails();
             $errors = $validation->errors()->firstOfAll();
            if (empty($errors)){

                $email = $_POST['email'];
                $password= $_POST['password'];
              $data= $this->objUserModel->login($email,$password);
              if (!empty($data)){

                session::set('user',$data);
                $home = new homecontroller();
                call_user_func_array([$home,'index'],[]);
              }else{
                header("location:login");
              }
            }else{
                header("location:login");
            }
             
    }
   }
   function postregister(){
    if(isset($_POST['register'])){
    $validator = new Validator;
       
    $validation = $validator->make($_POST, [
        'name'                  => 'required',
   'email'                 => 'required|email',
   'password'              => 'required|min:6',
    ]);
    $validation->validate();
    $validation->fails();
    $errors = $validation->errors()->firstOfAll();
    if(empty($errors)){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password= $_POST['password'];
       $data= $this->objUserModel->register($name,$email,$password);
       if($data){
        header("LOCATION: login");
       }else{
        header("LOCATION: register");
       }
    }else{
        header("LOCATION: register");
    }
   }else{
    header("LOCATION: register");
   }
}
   

}