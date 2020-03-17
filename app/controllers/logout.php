<?php

namespace Controller;

session_start();
class Logout
{
    public function get()
    {
        $_SESSION["authenticated"] = false;
        session_destroy();
        header("location: /");
    }

}
