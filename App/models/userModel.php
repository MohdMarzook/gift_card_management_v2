<?php


class userModel{
    private $db;
    function __construct($connection)
    {   
        $this->db = $connection;
    }

    function getAllCategory(){
        $stmt = $this->db->query("SELECT DISTINCT platform_category FROM platforms");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getPlatform($category = "") {
        $stmt = $this->db->prepare("SELECT platform_name FROM platforms WHERE platform_category LIKE :category");
        $stmt->bindValue(':category', '%' . $category . '%', PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getSelectedPlatform($platforms){
        $placeholders = str_repeat('?,', count($platforms) - 1) . '?';
        $query = "SELECT * FROM platforms WHERE platform_name IN ($placeholders)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($platforms);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getTemplateData($templateId) {
        $stmt = $this->db->prepare("SELECT * FROM platform_templates WHERE temp_id = :template_id");
        $stmt->bindValue(':template_id', $templateId);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
        
    }

    function getCardInfo($id) {
        // Get platform data
        $stmt = $this->db->prepare("SELECT * FROM platforms WHERE platform_id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            // Get template data
            $stmt = $this->db->prepare("SELECT * FROM platform_templates WHERE temp_id = :template_id");
            $stmt->bindValue(':template_id', $data['template']);
            $stmt->execute();
            $img_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $data["img_data"] = $img_data[0];
        }

        return $data;
    }

    function getExtraTemplates(){
        $stmt = $this->db->query("SELECT * FROM templates WHERE name != 'default'");
        $stmt->execute();
        $temp_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $temp_data;
    }

    function checkGivenToUser($email){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE emailid = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    function buyCard($value,$platform_id,$given_to,$given_by,$template_id,$expire_at){
        $stmt = $this->db->prepare("INSERT INTO gift_cards (value, code, platform_id, given_to, given_by, template_id, expire_at) VALUES (:value, :code, :platform_id, :given_to, :given_by, :template_id, :expire_at)");
        $code = $this->getCardCode();
        $stmt->bindValue(':value', $value);
        $stmt->bindValue(':code', $code);
        $stmt->bindValue(':platform_id', $platform_id);
        $stmt->bindValue(':given_to', $given_to);
        $stmt->bindValue(':given_by', $given_by);
        $stmt->bindValue(':template_id', $template_id);
        $stmt->bindValue(':expire_at', $expire_at);
        
        return $stmt->execute();
    }

    function getCardCode(){
        do {
            $code = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0, 4)). '-' .
            rand(1000,9999) . '-' .
            strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0, 4));
            
            $stmt = $this->db->prepare("SELECT * FROM gift_cards WHERE code = :code");
            $stmt->bindValue(':code', $code);
            $stmt->execute();
        } while ($stmt->rowCount() > 0);
        
        return $code;
    }

    function getUserId($email){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE emailid = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["user_id"];
    }

    function userGiftCards($user_id){
        $stmt = $this->db->prepare("SELECT * FROM gift_cards WHERE given_to = :user_id");
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPlatformTemplate($id){
        $stmt = $this->db->prepare("SELECT template FROM platforms WHERE platform_id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['template'];
    }


}