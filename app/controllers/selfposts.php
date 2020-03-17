<?php

namespace Controller;

class SelfPosts
{
    public static function get()
    {
       
        if ($_SESSION["auth"]=="true") {
            echo \View\Loader::make()->render("templates/render_feeds_non_main.twig", array(
                "feeds" => \Model\Feed::get_allSelf(),
                "comments" => \Model\Comment::getComments(),
                "liked_feeds" => \Model\Like::getAllLiked($_SESSION["username"]),
            ));
        } else {
            echo "you are not authenticated";
        }
    }
}
