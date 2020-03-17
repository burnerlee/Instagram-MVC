<?php

namespace Model;


use PDOException;
use PDO;

class User {

    public static function createUser($username,$password,$contact,$name) {                             //creates a new user
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
    public static function checkCredentials($username,$password){                                       //checks whether credentials of user is correct and authenticates
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
    public static function getUserData($username){          // returns user data
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
    public static function updateUserData($name,$bio,$email,$gender,$filepath){                     // update user data as he updates his profile
        $db = \DB::get_instance();              
        $sql = "UPDATE users SET name=:name,email=:email,gender=:gender,bio=:bio WHERE username=:username";
        $data=[
            ":name"=>$name,
            ":email"=>$email,
            ":gender"=>$gender,
            ":bio"=>$bio,            
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
    
    }
    public static function incPost(){                                                           // increase the count of post of user
        $db = \DB::get_instance();
        $sql = "UPDATE users SET post=post+1 WHERE username=:username";
        $stmt=$db->prepare($sql);
        $data=[
            ":username"=>$_SESSION["username"]
        ];
        $stmt->execute($data);
      
    }
    public static function getAllOtherUsers(){                                                  // returns data of all users except himself
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