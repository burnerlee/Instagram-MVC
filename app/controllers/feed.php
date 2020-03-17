<?php

namespace Controller;

class Feed
{
    public static function get()
    {
        if (isset($_SESSION["username"])) {
            $_SESSION["authenticated"] = \Model\User::checkCredentials($_SESSION["username"], $_SESSION["password"]);
        }

        if ($_SESSION["authenticated"]) {
            echo \View\Loader::make()->render("templates/render_feeds_main.twig", array(
                "feeds" => \Model\Feed::get_all(),
                "comments" => \Model\Comment::getComments(),
                "user" => \Model\User::getUserData($_SESSION["username"]),
                "follows" => \Model\Follow::getAllFollowing(),
                "liked_feeds" => \Model\Like::getAllLiked($_SESSION["username"]),
            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
