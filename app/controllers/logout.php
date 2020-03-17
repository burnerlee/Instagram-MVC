<?php

namespace Controller;

session_start();
class Logout
{
    public function get()
    {
        $_SESSION["auth"] = "false";
        session_destroy();
        header("location: /");
    }

}
