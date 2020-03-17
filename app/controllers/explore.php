<?php

namespace Controller;

class Explore
{
    public static function get()
    {
        if (isset($_SESSION["username"])) {
            $_SESSION["authenticated"] = \Model\User::checkCredentials($_SESSION["username"], $_SESSION["password"]);
        }

        if ($_SESSION["authenticated"]) {
            echo \View\Loader::make()->render("templates/explore.twig", array(
                "nonfollows" => \Model\Follow::getAllNonFollowing(),
                "follows" => \Model\Follow::getAllFollowing(),

            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
