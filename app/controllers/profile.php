<?php

namespace Controller;

class Profile
{
    public static function post()
    {
        $_SESSION["authenticated"] = false;
        $_SESSION["authenticated"] = \Controller\Authenticate::authenticate(); //check whether user is authenticated
        if ($_SESSION["authenticated"]) {
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
        if (isset($_SESSION["username"])) {
            $_SESSION["authenticated"] = \Model\User::checkCredentials($_SESSION["username"], $_SESSION["password"]);
        }

        if ($_SESSION["authenticated"]) {
            echo \View\Loader::make()->render("templates/profile.twig", array(
                "user" => \Model\User::getUserData($_SESSION["username"]),
                "feeds" => \Model\Feed::getFeedOfUser(),
            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
