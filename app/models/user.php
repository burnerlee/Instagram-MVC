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
    public static function updateUserData($name,$bio,$email,$gender,$filepath){
        $db = \DB::get_instance();
        $sql = "UPDATE users SET name=:name,email=:email,gender=:gender WHERE username=:username";
        $data=[
            ":name"=>$name,
            ":email"=>$email,
            ":gender"=>$gender,            
            ":username"=>$_SESSION["username"]
        ];
        $stmt=$db->prepare($sql);
        $stmt->execute($data);
        if($filepath=="assets/profile/"){}
        else{
            $sql = "UPDATE users SET user_image=:filepath WHERE username=:username";
            $data=[
                ":filepath"=>$filepath,            
                ":username"=>$_SESSION["username"]
            ];
            $stmt=$db->prepare($sql);
            $stmt->execute($data);
        }
        if(isset($bio)){}
        else{
            $sql = "UPDATE users SET bio=:bio WHERE username=:username";
            $data=[
                ":bio"=>$bio
            ];
            $stmt=$db->prepare($sql);
            $stmt->execute($data);
        }
    }
}