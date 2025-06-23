<?php
namespace App\controller;

class authController extends baseController{
    private $model;
    private $viewPath = "App/views/auth/";
    function __construct(){
        parent::__construct($this->viewPath);
        $this->model = $this->model('authModel');
    }

    function logout(){
        session_destroy();
        header("location: .");
    }

    function index() {
        if(!isset($_SESSION["email"])){
            header("Location:?controller=authController&action=login");
        }
        elseif($_SESSION["role"] == "user"){
            header("location:./?controller=userController");
        }
        else{
            header("location:./?controller=adminController");
        }
    }
    function login($data){
        extract($data);
        if(isset($params['errors'])){
            parse_str($params["errors"], $errors);
            $this->render("login", ["errors" => $errors]);
        }
        else{
            $this->render("login");
        }
    }
    function loginHandle($data) {
        extract($data);
        $model = $this->model;
        $errors=[];
        if(empty($POST['email']) || empty($POST['password'])){
            $errors[] = "one or more fields is missing";
        }
        if(!$model->checkUser($POST["email"], $POST["password"])){
            $errors[] = "Incorrect Email/Password given";
        }
        if(empty($errors)){
            $_SESSION['email'] = $POST["email"];
            $_SESSION['password'] = $POST["password"];
            $_SESSION['role'] = "user";
            $_SESSION['user_id'] = $model->getUserId($POST["email"],$POST["password"])["user_id"];
            if($model->checkAdmin($POST["email"], $POST["password"])){
                $_SESSION['role'] = "admin";
                header("location:?controller=adminController");
            }
            else{
                header("location:?controller=userController");
            }
        }
        else{   
            header("Location:?controller=authController&action=login&errors=". http_build_query($errors));
        }
    }

    function signup($data){
        extract($data);
        if(isset($params['errors'])){
            parse_str($params["errors"], $errors);
            $this->render("signup", ["errors" => $errors]);
        }
        $this->render('signup');

    }

    function signupHandler($data){
        extract($data);
        $model = $this->model;
        print_r($POST);
        $errors = [];
            
        if(empty($POST['username']) OR empty($POST['email']) OR empty($POST['password']) OR empty($POST['re_password'])){
            $errors[] = "One or more fields is missing.";
        }
        if($model->usernameCheck($POST['username'])){
            $errors[] = "User name is already existed";
        }
        if($model->useremailCheck($POST['email'])){
            $errors[] = "Email is already existed";
        }
        if($POST['password'] == $POST['re_password']){
            if(strlen($POST['password']) < 8 || strlen($POST['password']) > 12 ){
                $errors[] = "Password must be 8-12 characters";
            }
        }
        else{
            $errors[] = "Password doesn't match";
        }

        if(count($errors)==0){
            $response = $model->signup(
                $POST['username'],
                $POST['email'],
                $POST['password']
            );
            ($response) ? header("location:?controller=userController") : header("location:?controller=userController");
        }
        else{   
            header("Location:?controller=authController&action=signup&errors=". http_build_query($errors));
        }
    }
}


?>