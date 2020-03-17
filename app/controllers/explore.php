<?php

namespace Controller;

class Explore
{
    public static function get()
    {

        if ($_SESSION["auth"]=="true") {
            echo \View\Loader::make()->render("templates/explore.twig", array(
                "nonfollows" => \Model\Follow::getAllNonFollowing(),
                "follows" => \Model\Follow::getAllFollowing(),

            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
