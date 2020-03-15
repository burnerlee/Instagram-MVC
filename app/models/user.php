<?php

namespace Model;

use DB;
use PDOException;
use PDO;

class User {

    public static function createUser($username,$password,$contact,$name) {
        $db = \DB::get_instance();
        try{
            $sql = $db->prepare("SELECT * FROM users WHERE username = :username");
            $sql->execute(
                array(
                    ":username" => $username,                    
                )
            );
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            
            if($row)
            {
                echo "user with this username already exists";
            }
            else {
                $sql = "INSERT INTO users (username,password,email,name) VALUES (?,?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$username,$password,$contact,$name]);
                header("Location: /");
            }
            }
            catch(PDOException $e)
            {
                echo "error";
            }
       
       
    }
    public static function checkCredentials($username,$password){
        $db = \DB::get_instance();
        try{
            $sql = $db->prepare("SELECT * FROM users WHERE username = :username");
            $sql->execute(
                array(
                    ":username" => $username,                    
                )
            );
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            
            if($row["password"]==$password)
            {
                return true;
            }
            else return false;
            }
            catch(PDOException $e)
            {
                echo "error";
            }
        }
    public static function getUserData(){
        $db = \DB::get_instance();
        try{
            $sql = $db->prepare("SELECT * FROM users WHERE username = :username");
            $sql->execute(
                array(
                    ":username" => $_SESSION["username"],                    
                )
            );
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            return $row;
           
            }
            catch(PDOException $e)
            {
                echo "error";
            }
    }
}