<?php

namespace Controller;

class AddStory{
    public function get() {
     $username=$_SESSION["username"];
     \Model\AddStory::createStoryTable($username);
     echo \View\Loader::make()->render("templates/addstory.twig");
    }
    public function post(){
        $filePath="assets/stories/";
        $filename=$_FILES["img_file"]["name"];
        $caption=$_POST["caption"];;
        move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath.$filename);
        $filePath=$filePath.$filename;
        $username=$_SESSION["username"];
        \Model\AddStory::create($username,$filePath);
        \Model\User::incPost();
        header("Location:/feed");
  
    }
}
