<?php

namespace Model;

class Feed 
{
    public static function get_all() 
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM feeds INNER JOIN users ON feeds.username = users.username ORDER BY time DESC");
        $rows=$stmt->fetchAll();
        return $rows; 
    }

    public static function get_allTrending() 
    {
        $db = \DB::get_instance();
        $stmt = $db->query("SELECT * FROM feeds INNER JOIN users ON feeds.username = users.username ORDER BY no_of_likes DESC,time DESC");
        $rows=$stmt->fetchAll();
        return $rows;
    }

    public static function getFeedOfUser()
    {
        $db = \DB::get_instance();
        $data=[
        ":username" => $_SESSION["username"]
        ];
        $sql = $db->prepare("SELECT * FROM feeds WHERE username=:username");
        $sql->execute($data);
        $rows=$sql->fetchAll();
        return $rows; 
    }

    public static function get_allFollowing()
    {
        $db = \DB::get_instance();
                    $follows=[];
                    $data=[
                    ":username" => $_SESSION["username"]
                    ];
                    $sql = $db->prepare("SELECT * from followers WHERE follower_username=:username");
                    $sql->execute($data);
                    while($userData=$sql->fetch()){
                        $user=$userData["follow_username"];
                        array_push($follows,$user);
                        
                        }
                    $result=[];
                    foreach($follows as $user){
                    $sql = $db->prepare("SELECT * from feeds INNER JOIN users ON feeds.username = users.username WHERE feeds.username=:username ORDER BY feeds.time DESC");
                    $data=[
                        ":username"=>$user
                    ];
                    $sql->execute($data);
                    while($row=$sql->fetch()){
                        array_push($result,$row);
                        
                        }
        
                    }
                    return $result;
    }
    public static function get_allSelf()
    {
        $db = \DB::get_instance();
        $data=[
        ":username" => $_SESSION["username"]
        ];
        $sql = $db->prepare("SELECT * FROM feeds INNER JOIN users ON feeds.username=users.username WHERE feeds.username=:username ORDER BY feeds.time DESC");
        $sql->execute($data);
        $rows=$sql->fetchAll();
        return $rows; 
    }

}
