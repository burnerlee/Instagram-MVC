<?php

namespace Controller;

class FollowPosts {
    public static function post() {
        $_SESSION["authenticated"]=false;
        $username=$_POST["username"];
        $password=$_POST["password"];
        if(isset($password)){
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        
    }

    if(isset($_SESSION["username"]))
    $_SESSION["authenticated"]=\Model\User::checkCredentials($_SESSION["username"],$_SESSION["password"]);
      
        if($_SESSION["authenticated"]){
            echo \View\Loader::make()->render("templates/render_posts.twig",array(
                "feeds" => \Model\Feed::get_allFollowing(),
                "comments" => \Model\Comment::getComments(),
                ));
        }
        else{
            echo "you are not authenticated";
        }
    }
    public static function get(){
        if(isset($_SESSION["username"]))
    $_SESSION["authenticated"]=\Model\User::checkCredentials($_SESSION["username"],$_SESSION["password"]);
      
        if($_SESSION["authenticated"]){
            echo \View\Loader::make()->render("templates/render_posts.twig",array(
                "feeds" => \Model\Feed::get_allFollowing(),
                "comments" => \Model\Comment::getComments(),
                ));
        }
        else{
            echo "you are not authenticated";
        }
    }
}