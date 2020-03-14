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
        \Model\User::createUser($username,$password,$contact);
        header("Location: /");
    }
    
    
    
}
