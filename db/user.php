<?php

    class User{
        private $db;
        function __construct($con){
            $this->db=$con;
        }
        
        function insertUser($username,$password){
            try{
                $result = $this->getUserByUserName($username);
                if($result["num"]>0){
                    return false;
                }else{
                    $new_password = md5($password.$username); //การเข้ารหัส
                    $sql = "INSERT INTO users(username,password)
                    VAlUES(:username,:password)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(":username",$username);
                    $stmt->bindParam(":password",$new_password);
                    $stmt->execute();
                    return true;
                }
            }catch(PDOException $e){
                echo $e->getMessage();
                return False;
            }
        }

        function getUserByUserName($username){
            try{
                $sql = "SELECT COUNT(*) as num FROM users WHERE username=:username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":username",$username);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

            }catch(PDOException $e){
                echo $e->getMessage();
                return False;
            }

        }

        function getUser($username,$password){
            try{
                $sql = "SELECT * FROM users 
                WHERE username=:username AND password=:password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":username",$username);
                $stmt->bindParam(":password",$password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

            }catch(PDOException $e){
                echo $e->getMessage();
                return False;
            }

        }



    }



?>