<?php

namespace Controller;

class FollowPosts
{
    public static function get()
    {
        if (isset($_SESSION["username"])) {
            $_SESSION["authenticated"] = \Model\User::checkCredentials($_SESSION["username"], $_SESSION["password"]);
        }
        if ($_SESSION["authenticated"]) {
            echo \View\Loader::make()->render("templates/render_feeds_non_main.twig", array(
                "feeds" => \Model\Feed::get_allFollowing(),
                "comments" => \Model\Comment::getComments(),
                "liked_feeds" => \Model\Like::getAllLiked($_SESSION["username"]),
            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
