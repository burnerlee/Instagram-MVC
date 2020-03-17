<?php

namespace Controller;

class Edit {
    public static function post() {
        $_SESSION["authenticated"]=false;
        $username=$_POST["username"];
        $password=$_POST["password"];
        if(isset($password)){
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        
    }

    if(isset($_SESSION["username"]))
    $_SESSION["authenticated"]=\Model\User::checkCredentials($_SESSION["username"],$_SESSION["password"]);
      
        if($_SESSION["authenticated"]){
        echo \View\Loader::make()->render("templates/edit.twig",array(
            "user" => \Model\User::getUserData($_SESSION["username"]),
        ));
        }
        else{
            echo "you are not authenticated";
        }
    }
    public static function get(){
        if(isset($_SESSION["username"]))
    $_SESSION["authenticated"]=\Model\User::checkCredentials($_SESSION["username"],$_SESSION["password"]);
      
        if($_SESSION["authenticated"]){
        echo \View\Loader::make()->render("templates/edit.twig",array(
        "user" => \Model\User::getUserData($_SESSION["username"]),
         ));
        }
        else{
            echo "you are not authenticated";
        }
    }
}
