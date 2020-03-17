<?php

namespace Controller;

class Trending
{
    public static function get()
    {

        if ($_SESSION["auth"]=="true") {
            echo \View\Loader::make()->render("templates/render_feeds_non_main.twig", array(
                "feeds" => \Model\Feed::get_allTrending(),
                "comments" => \Model\Comment::getComments(),
                "liked_feeds" => \Model\Like::getAllLiked($_SESSION["username"]),
            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
