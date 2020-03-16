<?php

namespace Controller;
session_start();
class Post {
    public function get() {
     echo \View\Loader::make()->render("templates/post.twig");
    }
    public function post(){
        $filePath="assets/feeds/";
        $filename=$_FILES["img_file"]["name"];
        $caption=$_POST["caption"];;
        move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath.$filename);
        $filePath=$filePath.$filename;
        $username=$_SESSION["username"];
        \Model\Post::create($username,$filePath,$caption);
        \Model\User::incPost();
        header("Location:/feed");
  
    }
}
