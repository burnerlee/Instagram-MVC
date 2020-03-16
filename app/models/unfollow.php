<?php

namespace Model;

class Unfollow {

    public static function unfollow($follow_username,$follower_username) {
        $db = \DB::get_instance();
        $data = [

            ':follow_username' => $follow_username,
            ':follower_username' => $follower_username,
          
        ];
        $sql = "DELETE FROM followers where follower_username=:follower_username AND follow_username=:follow_username";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
      
        $db = \DB::get_instance();
        $data=
        [
            ":follow_username"=>$follow_username
        ];
        $sql = "UPDATE users SET follower=follower-1 WHERE username=:follow_username";
        $stmt=$db->prepare($sql);
        $stmt->execute($data);

        $db = \DB::get_instance();
        $data=
        [
            ":follower_username"=>$follower_username
        ];
        $sql = "UPDATE users SET following=following-1 WHERE username=:follower_username";
        $stmt=$db->prepare($sql);
        $stmt->execute($data);
    }
    
    
    
}
