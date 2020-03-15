<?php

namespace Model;

class Comment {

    public static function addComment($id,$content,$commentor_username) {
        $db = \DB::get_instance();
        $data = [

            'feed_id' => $id,
            'content' => $content,
            'commentor_username'=>$commentor_username,
        ];
        $sql = "INSERT INTO comments (feed_id,content,commentor_username) VALUES (:feed_id,:content,:commentor_username)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
       
    }
    public static function getComments(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM comments");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    
}
