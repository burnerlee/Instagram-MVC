<?php

namespace Model;

class Story {

    public static function get_all($username){                          //returns all content of the story
        $tablename=$username."_story";
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM $tablename INNER JOIN users ON :username = users.username ORDER BY time DESC");
        $data=[
            ":username"=>$username
        ];
        $stmt->execute($data);
        $rows=$stmt->fetchAll();
        return $rows; 
    }
  
    
}
