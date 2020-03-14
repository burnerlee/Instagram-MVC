<?php

namespace Controller;

class Comment {
    public function post() {
     $id=$_POST["id"];
     $comment=$_POST["comment"];
     \Model\Comment::addComment($id,$comment);   
     header("Location: /feed");
    }
   
    
}
