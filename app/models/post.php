<?php

namespace Model;

class Post {

    public static function create($username,$filepath,$caption) {           // create a post
        $db = \DB::get_instance();
        $tableName="feeds";
        $data = [
            'username'=> $username,
            'img' => $filepath,
            'caption' => $caption,
            "no_of_likes" => 0
        ];
        $sql = "INSERT INTO $tableName (username,img,caption,no_of_likes) VALUES (:username,:img,:caption,:no_of_likes)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
    }
}
