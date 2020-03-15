<?php

namespace Controller;
session_start();
class Feed {
    public function get() {
        $username=$_GET["username"];
        $password=$_GET["password"];
        if(isset($password)){
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;}
        $_SESSION["authenticated"]=\Model\User::checkCredentials($_SESSION["username"],$_SESSION["password"]);
        if($_SESSION["authenticated"]){
        echo \View\Loader::make()->render("templates/render_posts.twig",array(
        "feeds" => \Model\Feed::get_all(),
        //  "comments" => \Model\Comment::getComments(),
        ));
        }
        else{
            echo "you are not authenticated";
        }
    }
}
