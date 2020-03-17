<?php

namespace Controller;

class Comment {
    public function post() {
     $id=$_POST["id"];
     $content=$_POST["content"];
     $commentor_username=$_SESSION["username"];
     \Model\Comment::addComment($id,$content,$commentor_username);                      //function to add comment in the database
     header("Location: /feed");
    }
}
