<?php

namespace Controller;

class Authenticate
{
    public static function post()
    {$password = $_POST["password"];
        $username = $_POST["username"];
        if (\Controller\Authenticate::authenticate($username, $password)) {
            $_SESSION["auth"] = "true";

            header("location: /feed");
        } else {
            echo "you are not authenticated";
        }

    }

    public static function authenticate($username, $password) //function checks whether user is authenticated to login acccording to session variables

    {

        if (isset($username)) {
            $_SESSION["username"] = $username;

            if (isset($_SESSION["username"])) {
                $_SESSION["authenticated"] = \Model\User::checkCredentials($_SESSION["username"], $password); //checks whether user is authenticated to login
            }
            return $_SESSION["authenticated"];
        }
    }
}
