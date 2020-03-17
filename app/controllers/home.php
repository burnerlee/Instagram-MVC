<?php

namespace Controller;

class Home
{
    public function get()
    {
        
        if ($_SESSION["auth"]=="true") {
            header("location: /feed");
        } else {
            echo \View\Loader::make()->render("templates/home.twig");
        }

    }

}
