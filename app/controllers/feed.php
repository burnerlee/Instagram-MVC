<?php

namespace Controller;

class Feed {
    public function get() {
     echo \View\Loader::make()->render("templates/render_posts.twig",array(
         "feeds" => \Model\Feed::get_all(),
         "comments" => \Model\Comment::getComments(),
         
     ));
    }
    
    
    
}
