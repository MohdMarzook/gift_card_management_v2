<?php

class adminModel{
    private $db;
    function __construct($connection)
    {
        $this->db = $connection;
    }

    public function getAllPlatforms() {
        $stmt = $this->db->query("SELECT * FROM platforms");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPlatform($id){
        $stmt = $this->db->prepare("SELECT * FROM platforms WHERE platform_id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function keyCheck($key){
        $stmt = $this->db->prepare("SELECT * FROM platforms WHERE platform_key = :key");
        $stmt->bindParam(":key", $key);
        $stmt->execute();
        $response = $stmt->rowCount();
        return ($response) ? true : false;
    }

    public function getCategory(){
        $stmt = $this->db->prepare("SELECT DISTINCT platform_category FROM platforms");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $category = [];
        foreach($result as $data){
            $category[] = $data["platform_category"];
        }
        return $category;
    }

    public function duplicateCheck($platformname,$platformkey){
        $stmt = $this->db->prepare("SELECT * FROM platforms where platform_name = :platformname OR platform_key = :platformkey");
        $stmt->bindParam(":platformname", $platformname);
        $stmt->bindParam(":platformkey", $platformkey);
        $stmt->execute();
        $response = $stmt->rowCount();
        return ($response) ? true : false;
    }


    public function addPlatform($platform_name,$platform_key,$platform_category, $template_id = 1){
        $stmt = $this->db->prepare("INSERT INTO platforms (platform_name, platform_key, platform_category, template) VALUES (:platform_name,:platform_key,:platform_category, :template_id)");
        $stmt->bindParam( ":platform_name", $platform_name);
        $stmt->bindParam( ":platform_key", $platform_key);
        $stmt->bindParam( ":platform_category", $platform_category);
        $stmt->bindParam( ":template_id", $template_id);
        $response = $stmt->execute();
        return ($response) ? true : false;

    }

    public function addTemplate($name, $path){
        $stmt = $this->db->prepare("insert into platform_templates (name, path) values (:name, :path)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":path", $path);
        $stmt->execute();
        // $stmt = $this->db->prepare("select temp_id from platform_templates where path = :path");
        // $stmt->bindParam(":path", $path);
        $id = $this->db->lastInsertId();
        // $id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['temp_id'];
        return $id;
    }

    public function updatePlatform($platformName, $platformKey, $platformCategory, $templateId, $platformId){

        $stmt = $this->db->prepare("UPDATE platforms SET platform_name = :platform_name, platform_key = :platform_key, platform_category = :platform_category, template = :template_id WHERE platform_id = :platform_id");
        $stmt->bindParam(":platform_name", $platformName);
        $stmt->bindParam(":platform_key", $platformKey);
        $stmt->bindParam(":platform_category", $platformCategory);
        $stmt->bindParam(":template_id", $templateId);
        $stmt->bindParam(":platform_id", $platformId);

        return $stmt->execute();

    }

    public function deletePlatform($id){
        $stmt = $this->db->prepare("DELETE FROM platforms WHERE platform_id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

}