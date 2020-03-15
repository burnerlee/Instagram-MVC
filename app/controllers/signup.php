<?php

namespace Controller;

class Signup {
    public function get() {
     echo \View\Loader::make()->render("templates/signup.twig");
    }
    public function post(){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $contact=$_POST["contact-details"];
        $name=$_POST["name"];
        \Model\User::createUser($username,$password,$contact,$name);
        header("Location: /");
    }
    
    
    
}
