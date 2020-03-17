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
    public static function getUserData($username){
        $db = \DB::get_instance();
        try{
            $sql = $db->prepare("SELECT * FROM users WHERE username = :username");
            $sql->execute(
                array(
                    ":username" =>$username,                    
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
        if(isset($bio)){
        
            $sql = "UPDATE users SET bio=:bio WHERE username=:username";
            $data=[
                ":bio"=>$bio,
                ":username"=>$_SESSION["username"]
            ];
            $stmt=$db->prepare($sql);
            $stmt->execute($data);
        }
    }
    public static function incPost(){
        $db = \DB::get_instance();
        $sql = "UPDATE users SET post=post+1 WHERE username=:username";
        $stmt=$db->prepare($sql);
        $data=[
            ":username"=>$_SESSION["username"]
        ];
        $stmt->execute($data);
      
    }
    public static function getAllOtherUsers(){
        $db = \DB::get_instance();
        try{
            $sql = $db->prepare("SELECT * FROM users WHERE username!=:username");
            $data=[
                "username"=>$_SESSION["username"]
            ];
            $sql->execute($data);
            $rows = $sql->fetchAll();
            return $rows;
           
            }
            catch(PDOException $e)
            {
                echo "error";
            }
    }
}