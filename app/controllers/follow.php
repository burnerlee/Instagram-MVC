<?php

namespace Controller;

class Follow
{
    public function get()
    {
        $follow_username = $_GET["username"];
        $follower_username = $_SESSION["username"];
        \Model\Follow::follow($follow_username, $follower_username);
        header("Location: /explore");
    }
}
