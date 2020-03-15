<?php

namespace Controller;
session_start();
class EditSubmit {
    public function post(){
        $name=$_POST["name"];
        $bio=$_POST["bio"];
        $email=$_POST["email"];
        $gender=$_POST["gender"];

    \Model\User::updateUserData($name,$bio,$email,$gender);
    header("location: /edit");

}}