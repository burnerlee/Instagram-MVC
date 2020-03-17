<?php

namespace Controller;

class EditSubmit
{
    public function post()
    {
        $name = $_POST["name"];
        $bio = $_POST["bio"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $filePath = "assets/profile/";
        $filename = $_FILES["img_file"]["name"];
        $dir_name = 'assets/profile';
        if (!is_dir($dir_name)) {            
            echo "Directory created";
        }
        move_uploaded_file($_FILES["img_file"]["tmp_name"], $filePath.$filename);
        $filePath = $filePath . $filename;
        \Model\User::updateUserData($name, $bio, $email, $gender, $filePath);
        header("location: /edit");
    }}
