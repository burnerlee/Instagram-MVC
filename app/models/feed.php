<?php

namespace Model;

class Feed
{
    public static function get_all()                    //return feeds all the users registered
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM feeds INNER JOIN users ON feeds.username = users.username ORDER BY time DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function get_allTrending()            //returns all the feeds trending according to most number of details
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM feeds INNER JOIN users ON feeds.username = users.username ORDER BY no_of_likes DESC,time DESC");
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public static function getFeedOfUser()              //returns all the feeds posted by the user himself
    {
        $db = \DB::get_instance();
        $data = [
            ":username" => $_SESSION["username"],
        ];
        $sql = $db->prepare("SELECT * FROM feeds WHERE username=:username");
        $sql->execute($data);
        $rows = $sql->fetchAll();
        return $rows;
    }

    public static function get_allFollowing()           //returns feeds of people whom we follow
    {
        $db = \DB::get_instance();
        $follows = [];
        $data = [
            ":username" => $_SESSION["username"],
        ];
        $sql = $db->prepare("SELECT * from followers WHERE follower_username=:username");
        $sql->execute($data);
        while ($userData = $sql->fetch()) {
            $user = $userData["follow_username"];
            array_push($follows, $user);

        }
        $result = [];
        foreach ($follows as $user) {
            $sql = $db->prepare("SELECT * from feeds INNER JOIN users ON feeds.username = users.username WHERE feeds.username=:username ORDER BY feeds.time DESC");
            $data = [
                ":username" => $user,
            ];
            $sql->execute($data);
            while ($row = $sql->fetch()) {
                array_push($result, $row);

            }

        }
        return $result;
    }
    public static function get_allSelf()                //returns feeds of user along with his data
    {
        $db = \DB::get_instance();
        $data = [
            ":username" => $_SESSION["username"],
        ];
        $sql = $db->prepare("SELECT * FROM feeds INNER JOIN users ON feeds.username=users.username WHERE feeds.username=:username ORDER BY feeds.time DESC");
        $sql->execute($data);
        $rows = $sql->fetchAll();
        return $rows;
    }

}
