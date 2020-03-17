<?php

namespace Controller;

class Like {
    public function get() {
     $feed_id= $_GET["feed_id"];
     $liked=\Model\Like::alreadyLiked($feed_id);
     if ($liked){
    \Model\Like::decLike($feed_id);
     }
     else{
     \Model\Like::addLike($feed_id);
     }
    
    }
   
    
}
