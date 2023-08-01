<?php

namespace MVC\models;
use Exception;
use MVC\core\model;
  use PDO;

 class usermodel extends model{
      public function login ($email,$password){
          $query= "SELECT * from `user` WHERE `email`=? AND `password`=?";
          $query=parent::connection()->prepare($query);
          $query->execute([$email,$password]);
          $data=$query->fetch(PDO::FETCH_ASSOC);
          return($data);
      }
      function register($name,$email,$password){
        $query="INSERT INTO `user` (`name`,`email`,`password`)VALUES(?,?,?)";
        try{
            $query=parent::connection()->prepare($query);
            $query->execute([$name,$email,$password]);
           return true;
        }catch(Exception){
            return false;
        }
      }

 }