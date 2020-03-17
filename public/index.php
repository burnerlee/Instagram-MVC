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
    "/like"=>"\Controller\Like",
    "/profile"=>"\Controller\Profile",
    "/edit"=>"\Controller\Edit",
    "/editSubmit"=>"\Controller\EditSubmit",
    "/trending"=>"\Controller\Trending",
    "/explore"=>"\Controller\Explore",
    "/follow"=>"\Controller\Follow",
    "/unfollow"=>"\Controller\Unfollow",
    "/followPost"=>"\Controller\FollowPosts",
    "/selfPosts"=>"\Controller\SelfPosts",
    "/addstory"=>"\Controller\AddStory",
    "/storyWorking"=>"\Controller\StoryWorking",
    "/authenticate"=>"\Controller\Authenticate"
));
