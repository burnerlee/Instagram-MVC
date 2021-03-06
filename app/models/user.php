<?php

namespace Model;

use PDO;
use PDOException;

class User
{

    public static function createdUser($username, $password, $contact, $name)
    {                                                                                                           //creates a new user and returns true if user is created
        $db = \DB::get_instance();
        try {
            $sql = $db->prepare("SELECT * FROM users WHERE username = :username"); //check for same username if already existing
            $sql->execute(
                array(
                    ":username" => $username,
                )
            );
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            $sql = $db->prepare("SELECT * FROM users WHERE email = :email"); //check for same email if already registered
            $sql->execute(
                array(
                    ":email" => $contact,
                )
            );
            $row2 = $sql->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                echo "user with this username already exists";
            } elseif ($row2) {
                echo "user with this email already exists";
            } else {
                $sql = "INSERT INTO users (username,password,email,name) VALUES (?,?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$username, $password, $contact, $name]);
                return true;
            }
        } catch (PDOException $e) {
            echo "error";
        }

    }
    public static function checkCredentials($username, $password)
    { //checks whether credentials of user is correct and authenticates
        $db = \DB::get_instance();
        try {
            $sql = $db->prepare("SELECT * FROM users WHERE username = :username");
            $sql->execute(
                array(
                    ":username" => $username,
                )
            );
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $hash= hash('ripemd160', $password);
            if ($row["password"] == $hash) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "error";
        }
    }
    public static function getUserData($username)
    { // returns user data
        $db = \DB::get_instance();
        try {
            $sql = $db->prepare("SELECT * FROM users WHERE username = :username");
            $sql->execute(
                array(
                    ":username" => $username,
                )
            );
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            echo "error";
        }
    }
    public static function updateUserData($name, $bio, $email, $gender, $filepath)
    { // update user data as he updates his profile
        $db = \DB::get_instance();
        $sql = "UPDATE users SET name=:name,email=:email,gender=:gender,bio=:bio WHERE username=:username";
        $data = [
            ":name" => $name,
            ":email" => $email,
            ":gender" => $gender,
            ":bio" => $bio,
            ":username" => $_SESSION["username"],
        ];
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        if ($filepath == "assets/profile/") {} else {
            $sql = "UPDATE users SET user_image=:filepath WHERE username=:username";
            $data = [
                ":filepath" => $filepath,
                ":username" => $_SESSION["username"],
            ];
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
        }

    }
    public static function incPost()
    { // increase the count of post of user
        $db = \DB::get_instance();
        $sql = "UPDATE users SET post=post+1 WHERE username=:username";
        $stmt = $db->prepare($sql);
        $data = [
            ":username" => $_SESSION["username"],
        ];
        $stmt->execute($data);

    }
    public static function getAllOtherUsers()
    { // returns data of all users except himself
        $db = \DB::get_instance();
        try {
            $sql = $db->prepare("SELECT * FROM users WHERE username!=:username");
            $data = [
                "username" => $_SESSION["username"],
            ];
            $sql->execute($data);
            $rows = $sql->fetchAll();
            return $rows;

        } catch (PDOException $e) {
            echo "error";
        }
    }
}
