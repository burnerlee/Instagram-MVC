<?php

namespace Controller;

session_start();
class Edit
{
    public static function post()
    {
        echo \View\Loader::make()->render("templates/edit.twig", array(
            "user" => \Model\User::getUserData($_SESSION["username"]),
        ));

    }
    public static function get()
    {

        if ($_SESSION["auth"]==="true") {
            echo \View\Loader::make()->render("templates/edit.twig", array(
                "user" => \Model\User::getUserData($_SESSION["username"]),
            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
