<?php

namespace Controller;

class Profile
{
    public static function post()
    {
        
        if ($_SESSION["auth"]=="true") {
            echo \View\Loader::make()->render("templates/profile.twig", array(
                "user" => \Model\User::getUserData($_SESSION["username"]),
                "feeds" => \Model\Feed::getFeedOfUser(),
            ));
        } else {
            echo "you are not authenticated";
        }
    }
    public static function get()
    {
       

        if ($_SESSION["auth"]=="true") {
            echo \View\Loader::make()->render("templates/profile.twig", array(
                "user" => \Model\User::getUserData($_SESSION["username"]),
                "feeds" => \Model\Feed::getFeedOfUser(),
            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
