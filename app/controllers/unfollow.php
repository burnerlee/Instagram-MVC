<?php

namespace Controller;

class Unfollow
{
    public function get()
    {
        $follow_username = $_GET["username"];
        $back=$_GET["back"];
        $follower_username = $_SESSION["username"];
        \Model\Unfollow::unfollow($follow_username, $follower_username);
        $location="Location: /".$back;
        header($location);
    }
}
