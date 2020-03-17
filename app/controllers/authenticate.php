<?php

namespace Controller;

class Authenticate
{
    public static function post()
    {
        if (\Controller\Authenticate::authenticate()) {
            header("location: /feed");
        } else {
            echo "you are not authenticated";
        }

    }

    public static function authenticate()                                       //function checks whether user is authenticated to login acccording to session variables
    {
        $_SESSION["authenticated"] = false;
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (isset($password)) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            if (isset($_SESSION["username"])) {
                $_SESSION["authenticated"] = \Model\User::checkCredentials($_SESSION["username"], $_SESSION["password"]); //checks whether user is authenticated to login
            }

            if ($_SESSION["authenticated"]) {
                return true;
            } else {
                return false;
            }
        }
    }
}
