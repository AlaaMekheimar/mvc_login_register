<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\session;
class homecontroller extends controller{
    function __construct()
    {
        session::start();
        $user_data = session::get('user');
        if(empty($user_data)){
            echo "class not acess";
            die;
        }
    }
    public function index(){
        $this->view("home/index",['title'=>"home"]);
    }
}