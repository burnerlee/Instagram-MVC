<?php

namespace Model;

class AddStory {

    public static function createStoryTable($username){

    }
    public static function create($username,$filepath){
        $tableName=$username."_story";
        $db = \DB::get_instance();
        $data = [
            
            'img' => $filepath
            
        ];
        $sql = "INSERT INTO $tableName (img) VALUES (:img)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        header("location: /feed");
    }
    
}
