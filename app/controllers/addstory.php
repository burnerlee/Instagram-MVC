<?php

namespace Controller;

class AddStory
{
    public function get()
    {
        $username = $_SESSION["username"];
        echo \View\Loader::make()->render("templates/addstory.twig"); //send to page where we can upload images to story
    }
    public function post()
    {
        $filePath = "assets/stories/";
        $filename = $_FILES["img_file"]["name"];
        $dir_name = 'assets/stories';
        if (!is_dir($dir_name)) {               //create stories folder if not already present
            mkdir($dir_name);
        }
        move_uploaded_file($_FILES["img_file"]["tmp_name"], $filePath.$filename);
        $filePath = $filePath . $filename;
        $username = $_SESSION["username"];
        \Model\AddStory::create($username, $filePath); //add image to story as file is posted
        header("Location:/feed");

    }
}
