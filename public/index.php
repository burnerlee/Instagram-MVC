<?php
session_start();
$_SESSION["authenticated"]=false;
require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/feed" => "\Controller\Feed",
    "/explore" => "\Controller\Explore",
    "/post" => "\Controller\Post",
    "/signup" => "\Controller\Signup",
    "/addComment"=> "\Controller\Comment",
    "/logout"=> "\Controller\Logout",
    "/Like"=>"\Controller\Like",
));
