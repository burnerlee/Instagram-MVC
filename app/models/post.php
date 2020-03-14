<?php

namespace Model;

class Post {

    public static function create($filepath,$caption) {
        $db = \DB::get_instance();
        $username="burnerlee";
        $like=0;
        $data = [

            'img_username' => $username,
            'img' => $filepath,
            'img_owner' => $filepath,
            'no_of_like' => $like,
            'caption' => $caption
        ];
        $sql = "INSERT INTO feeds (img_username,img,img_owner,no_of_like,caption) VALUES (:img_username,:img,:img_owner,:no_of_like,:caption)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
       
    }
    
    
}
