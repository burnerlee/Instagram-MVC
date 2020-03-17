<?php

namespace Controller;

class Followers
{
    public static function get()
    {

        if ($_SESSION["auth"] == "true") {
            echo \View\Loader::make()->render("templates/followers.twig", array(

                "followers" => \Model\Follow::getAllFollowers(),

            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
