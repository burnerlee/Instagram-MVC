<?php

use function PHPSTORM_META\type;

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

$a=array();

$stmt1 = $db->query("SELECT * FROM users");
while($userData=$stmt1->fetch(PDO::FETCH_ASSOC)){
$user=$userData["username"];
array_push($a,$user);

}
$result = [];
foreach($a as $username){
$table=$username."FeedTable";
$stmt = $db->query("SELECT * FROM $table");
array_push($result, $stmt->fetchAll());

}

var_dump($result);
