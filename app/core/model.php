<?php
namespace MVC\core;

use PDO;

class model{
    protected function connection(){
    
        $username= "root";
        $password="";
        $dbname="userlogin";
        $host="localhost";
        $dns= ("mysql:host=$host;dbname=$dbname");
        return new PDO($dns,$username,$password);
    }       
   
}