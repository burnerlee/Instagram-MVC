<?php

namespace Controller;
session_start();
class EditSubmit {
    public function post(){
        $name=$_POST["name"];
        $bio=$_POST["bio"];
        $email=$_POST["email"];
        $gender=$_POST["gender"];
        $filePath="assets/profile/";
        $filename=$_FILES["img_file"]["name"];
        
        move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath.$filename);
        $filePath=$filePath.$filename;

    \Model\User::updateUserData($name,$bio,$email,$gender,$filePath);
    header("location: /edit");
}}