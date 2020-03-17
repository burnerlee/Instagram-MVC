<?php

namespace Controller;

class Signup
{
    public function get()
    {
        echo \View\Loader::make()->render("templates/signup.twig");
    }
    public function post()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $contact = $_POST["contact-details"];
        $name = $_POST["name"];
        $hash= hash('ripemd160', $password);
        if(\Model\User::createdUser($username, $hash, $contact, $name)){
            $_SESSION["auth"]="true";
            $_SESSION["username"]=$username;
            header("Location: /");
        }

    }

}
