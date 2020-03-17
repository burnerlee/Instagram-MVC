<?php

namespace Controller;

class Home
{
    public function get()
    {
        if (isset($_SESSION["username"])) {
            $_SESSION["authenticated"] = \Model\User::checkCredentials($_SESSION["username"], $_SESSION["password"]);
        }
        if ($_SESSION["authenticated"]) {
            header("location: /feed");
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }

    }

}
