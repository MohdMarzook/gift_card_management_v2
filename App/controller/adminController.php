<?php

namespace App\controller;

class adminController extends baseController{

    private $viewPath = "App/views/admin/";
    protected $model;

    function __construct() {
        parent::__construct($this->viewPath);
        if(!isset($_SESSION["email"])){
            header("Location:?controller=authController&action=login");
        }
        elseif($_SESSION["role"] == "user"){
            header("location:./?controller=userController");
        }
        $this->model = $this->model("adminModel");
    }

    function keyGen(){
        do {
            $key = rand(1000,9999);
            $result = $this->model->keyCheck($key);
        } while ($result);
        return $key;
    }

    function index($data) {
        extract($data);
        $errors = [];
        if(isset($params['error'])){
            $errors[] = $params["error"];
        }
        $platforms = $this->model->getAllPlatforms();
        $this->render("index", ["platforms" => $platforms, "errors" => $errors]);
    }

    function addPlatform($data) {
        extract($data);
        $model = $this->model;
        $randomKey = $this->keyGen();
        $categorys = $model->getCategory();
        if(isset($params['errors'])){
            parse_str($params["errors"], $errors);
            $this->render("addPlatform", ["key" => $randomKey, "category" => $categorys, "errors" => $errors]);
        }
        else{
            $this->render("addPlatform", ["key" => $randomKey, "category" => $categorys]);
        }
        
    }

    function addTemplate($platform_name, $path){
        return $this->model->addTemplate($platform_name, $path);
    }

    function addPlatformHandler($data){
        extract($data);
        $allowed_formats = ["jpeg", "png", "jpg"];
        $errors = [];
        if(empty($POST['platform_name']) || empty($POST['platform_key']) || empty($POST['category'])){
            $errors[] = "one or more fields missing";
        }
        else{
            $platform_name = $POST['platform_name'];
            $platform_key = $POST['platform_key'];
            if($this->model->duplicateCheck($platform_name, $platform_key)){
                $errors[] = "The platform already exists";
            }
            $platform_category = $POST['category'];
            $file_size = round($FILES['image']['size']/1024);
            $file_type = strtolower(pathinfo(basename($FILES["image"]["name"]), PATHINFO_EXTENSION));
            if($file_size > 300){
                $errors[] = "The file size exceeds the limit";
            }
            if(!in_array($file_type, $allowed_formats) && !empty($file_type)){
                $errors[] = "The file type is not allowed";
            }
        }

        if(empty($errors)){
            if(empty($FILES['image']['size'])){
                $response = $this->model->addPlatform($platform_name,$platform_key,$platform_category);
                ($response) ?  header("location:?controller=adminController") :  header("location:?controller=adminController&action=addPlatform");
            }
            else{
                $img_temp_path = $FILES['image']["tmp_name"];
                $target_path = "./public/platform_templates";
                if(!file_exists($target_path)){
                    mkdir($target_path);
                }
                $file_name = $platform_key."-".str_replace(" ","_",$platform_name).'.'.$file_type;
                $path = $target_path.'/'.$file_name;
                if(move_uploaded_file($img_temp_path, $path)){
                    $templateId = $this->addTemplate($platform_name, $path);
                    $response = $this->model->addPlatform($platform_name,$platform_key,$platform_category, $templateId);
                    ($response) ?  header("location:?controller=adminController") :  header("location:?controller=adminController&action=addPlatform");
                }
            }
        }
        else{
            header("location:?controller=adminController&action=addPlatform&errors=". http_build_query($errors));
        }
    }
    function editPlatform($data){
        extract($data);
        $errors = [];
        if(isset($params["errors"])){
            parse_str($params["errors"], $errors);
        }
        $platform_data = $this->model->getPlatform($data['params']['id']);
        $data["category"] = $this->model->getCategory();
        $data["data"] = $platform_data[0];
        $data["errors"] = $errors;
        $this->render('addPlatform',  $data);        

    }

    function editPlatformHandler($data){
        extract($data);
        $allowed_formats = ["jpeg", "png", "jpg"];
        $errors = [];
        if(empty($POST['platform_name']) || empty($POST['platform_key']) || empty($POST['category'])){
            $errors[] = "one or more fields missing";
        }
        else{
            $platform_name = $POST['platform_name'];
            $platform_key = $POST['platform_key'];
            $platform_category = $POST['category'];
            $file_size = round($FILES['image']['size']/1024);
            $file_type = strtolower(pathinfo(basename($FILES["image"]["name"]), PATHINFO_EXTENSION));
            if($file_size > 300){
                $errors[] = "The file size exceeds the limit";
            }
            if(!in_array($file_type, $allowed_formats) && !empty($file_type)){
                $errors[] = "The file type is not allowed";
            }
        }

        if(empty($errors)){
            if(empty($FILES['image']['size'])){
                print_r($POST);
                $response = $this->model->updatePlatform( $platform_name, $platform_key,  $platform_category, $POST["template_id"], $POST["platform_id"]);
                if($response)  {
                    header("Location:.");
                }
            }
            else{
                $img_temp_path = $FILES['image']["tmp_name"];
                $target_path = "./public/platform_templates";
                if(!file_exists($target_path)){
                    mkdir($target_path);
                }
                $file_name = $platform_key."-".str_replace(" ","_",$platform_name).'.'.$file_type;
                $path = $target_path.'/'.$file_name;
                if(move_uploaded_file($img_temp_path, $path)){
                    $templateId = $this->addTemplate($platform_name, $path);
                    $response = $this->model->updatePlatform($POST["platform_name"], $POST["platform_key"], $POST["category"], $templateId, $POST["platform_id"]);
                    if($response){
                        header("location:?controller=adminController&action=index");
                    }
                }
            }
        }
        else{
            header("location:?controller=adminController&action=editPlatform&id={$POST["platform_id"]}&errors=". http_build_query($errors));
        }

    }

    function deletePlatform($data) {
        extract($data);
        try {
            $response = $this->model->deletePlatform($params["id"]);
        }
        catch (\PDOException $e) {
            $error = "Database error: Unable to delete platform";
            header("Location:?controller=adminController&error=" . urlencode($error));
            return;
        }
        catch (\Exception $e) {
            $error = "An error occurred while deleting the platform";
            header("Location:?controller=adminController&error=" . urlencode($error));
            return;
        }

        if($response){
            header("Location:.");
        }
    }

}