<?php

namespace Controller;

class Following
{
    public static function get()
    {

        if ($_SESSION["auth"] == "true") {
            echo \View\Loader::make()->render("templates/following.twig", array(

                "follows" => \Model\Follow::getAllFollowing(),

            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
