<?php

namespace Model;

class Comment {

    public static function addComment($id,$comment) {
        $db = \DB::get_instance();
        $data = [

            'feed_id' => $id,
            'comment' => $comment,
            
        ];
        $sql = "INSERT INTO comment (feed_id,comment) VALUES (:feed_id,:comment)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
       
    }
    public static function getComments(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM comment");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public static function createCommentTable($username){
        $db = \DB::get_instance();
        $tableName=$username."CommmentTable";
        $sql = "CREATE TABLE $tableName (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            feed_id INT NOT NULL,
            comment VARCHAR(30) NOT NULL
            )";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
    
}
