<?php

namespace Model;

class Follow
{

    public static function follow($follow_username, $follower_username)             //insert data into database of follower and following
    {
        $db = \DB::get_instance();
        $data = [

            ':follow_username' => $follow_username,
            ':follower_username' => $follower_username,

        ];
        $sql = "INSERT INTO followers (follow_username,follower_username) VALUES (:follow_username,:follower_username)";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);

        $db = \DB::get_instance();
        $data =
            [
            ":follow_username" => $follow_username,
        ];
        $sql = "UPDATE users SET follower=follower+1 WHERE username=:follow_username";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);

        $db = \DB::get_instance();
        $data =
            [
            ":follower_username" => $follower_username,
        ];
        $sql = "UPDATE users SET following=following+1 WHERE username=:follower_username";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
    }
    public static function getAllFollowing()                                    // returns all follows of the user
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM followers INNER JOIN users ON followers.follow_username=users.username WHERE follower_username=:username");
        $data = [
            ":username" => $_SESSION["username"],
        ];
        $stmt->execute($data);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public static function getAllNonFollowing()                                 // returns all non-follows of user
    {
        $db = \DB::get_instance();
        $sql = "SELECT * FROM users
        WHERE username NOT IN(
            SELECT follow_username
            FROM followers
            WHERE follower_username=:username
        )
        AND username!=:username";
        $stmt = $db->prepare($sql);
        $data = [
            ":username" => $_SESSION["username"],
        ];
        $stmt->execute($data);
        $rows = $stmt->fetchAll();
        return $rows;
    }

}
