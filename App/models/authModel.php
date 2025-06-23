<?php

class authModel{
    private $db;
    function __construct($connection)
    {
        $this->db = $connection;
    }
    function checkUser($emailid, $password){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE emailid = :emailid AND password = :password");
        $stmt->bindParam(":emailid",$emailid);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        $response = $stmt->rowCount();
        return ($response) ? true : false;
    }
    function checkAdmin($emailid, $password){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE emailid = :emailid AND password = :password");
        $stmt->bindParam(":emailid",$emailid);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["is_admin"];
        return ($response) ? true : false;
    }
    function usernameCheck($name){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE name = :name");
        $stmt->bindParam(":name", $name);
        $stmt->execute();
        $response = $stmt->rowCount();
        return ($response) ? true : false;
    }
    function useremailCheck($email){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE emailid= :emailid");
        $stmt->bindParam(":emailid", $email);
        $stmt->execute();
        $response = $stmt->rowCount();
        return ($response) ? true : false;
    }
    function signup($name,$email,$password){
        $stmt = $this->db->prepare("INSERT INTO users (name, emailid, password) VALUES (:name,:email,:password)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $response = $stmt->rowCount();
        return ($response) ? true : false;
    }

    function getUserId($emailid, $password){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE emailid = :emailid AND password = :password");
        $stmt->bindParam(":emailid",$emailid);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        return $response;
    }

    

}

?>

