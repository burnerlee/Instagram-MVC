<?php

namespace Model;

class Feed {

    public static function get_all() {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM feeds  INNER JOIN users ON feeds.username = users.username");
        $rows=$stmt->fetchAll();
        return $rows; 
    }
    public static function getFeedOfUser(){
        $db = \DB::get_instance();
        $data=[
            ":username" => $_SESSION["username"]
              
        ];
        $sql = $db->prepare("SELECT * FROM feeds WHERE username=:username");
        $sql->execute($data);
        $rows=$sql->fetchAll();
        return $rows; 
    }
}
