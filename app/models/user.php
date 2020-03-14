<?php

namespace Model;

class User {

    public static function createUser($username,$password,$contact) {
        $db = \DB::get_instance();
        $sql = "INSERT INTO users (username,password,email) VALUES (?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$username,$password,$contact]);
       
    }
    
    
}
