<?php

namespace Model;
use PDO;
use PDOException;
class Like {

    public static function addLike($feed_id) {
        $db = \DB::get_instance();
        $sql = "UPDATE feeds SET no_of_likes=no_of_likes+1 WHERE feed_id=$feed_id";
        $db->query($sql);
        $data = [

            'feed_id' => $feed_id,
            'username' => $_SESSION["username"],
           
        ];
        $sql = "INSERT INTO likes (feed_id,liker_username) VALUES (:feed_id,:username)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        
    }
    public static function decLike($feed_id) {
        $db = \DB::get_instance();
        $sql = "UPDATE feeds SET no_of_likes=no_of_likes-1 WHERE feed_id=$feed_id";
        $db->query($sql);
        $data = [

            ':id' => $feed_id,
            ':username' => $_SESSION["username"],
           
        ];
        $sql = "DELETE FROM likes WHERE feed_id=:id AND liker_username=:username";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        
    }
    
    public static function alreadyLiked($feed_id){
        $db = \DB::get_instance();
        $data=[
            ":username" => $_SESSION["username"],
            ":id" => $feed_id,     
        ];
        $sql = $db->prepare("SELECT * FROM likes WHERE feed_id = :id AND liker_username=:username");
        $sql->execute($data);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            
            if($row)
            {
               return true;
            }
            else {
                return false;
            }
          
       
    }
    public static function getAllLiked($username){
        $db = \DB::get_instance();
        $data=[
        ":username" => $username
        ];
        $sql = $db->prepare("SELECT * FROM likes WHERE liker_username=:username");
        $sql->execute($data);
        $rows=$sql->fetchAll();
        return $rows; 
    }
}
