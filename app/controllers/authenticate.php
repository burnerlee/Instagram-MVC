<?php

namespace Controller;


class Authenticate {
    public static function post() {
        $_SESSION["authenticated"]=false;
        $username=$_POST["username"];
        $password=$_POST["password"];
        if(isset($password)){
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;

        if(isset($_SESSION["username"]))
        $_SESSION["authenticated"]=\Model\User::checkCredentials($_SESSION["username"],$_SESSION["password"]);
          
            if($_SESSION["authenticated"]){
                header("location: /feed");
            }
            else{
                echo "you are not authenticated";
            }
        }
       
    }

   
    
}
