<?php



class DB {
    private static $instance;

    public static function get_instance() {
        include __DIR__."/../config/config.php";
        if (!self::$instance) {
            self::$instance = new PDO(
                "mysql:host=".$DB_HOST.";port=".$DB_PORT.";dbname=".$DB_NAME,
                $DB_USERNAME,
                $DB_PASSWORD
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}

$db = \DB::get_instance();
$a=[];
            $data=[
            ":username" => "burnerlee"
            ];
            $sql = $db->prepare("SELECT * from followers WHERE follower_username=:username");
            $sql->execute($data);
            while($userData=$sql->fetch()){
                $user=$userData["follow_username"];
                array_push($a,$user);
                
                }
            $result=[];
            foreach($a as $user){
            $sql = $db->prepare("SELECT * from feeds WHERE username=:username");
            $data=[
                ":username"=>$user
            ];
            $sql->execute($data);
            while($row=$sql->fetch()){
                array_push($result,$row);
                
                }

            }
            var_dump($result);
