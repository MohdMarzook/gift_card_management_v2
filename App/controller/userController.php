<?php 

namespace App\controller;


class userController extends baseController{

    private $viewPath = "App/views/user/";
    protected $model;

    function __construct() {
        parent::__construct($this->viewPath);
        if(!isset($_SESSION["email"])){
            header("Location:?controller=authController&action=login");
        }        
        $this->model = $this->model("userModel");
    }
    // data has params , post , files 
    function index($data) {
        extract($data);
        $category = $this->model->getAllCategory();
        if(!isset($params["category"])){
            header("Location:?controller=userController&category=all");
        }

        $platforms = $this->model->getPlatform(($params["category"] == 'all') ? "" : $params["category"]);
        $platforms = array_map(function($item){
            return $item["platform_name"];
        }, $platforms);

        if(isset($params["selected"])){
            $selected_platforms = explode(",",$params['selected']);
            $cards = $this->model->getSelectedPlatform($selected_platforms);
        }
        else{
            $cards = $this->model->getSelectedPlatform($platforms);
        }

        foreach($cards as &$card){
            $card["img_data"] = $this->model->getTemplateData($card['template']);
        }
        unset($card);
        
        $category = array_map(function($item){
            return $item["platform_category"];
        }, $category);
        
        $this->render("home", ["category" => $category, "platforms" => $platforms, "cards" => $cards]);
        // $this->render("home", ["category" => $category, "platforms" => $platforms]);
    }
    function filterHandler($data){
        extract($data);
        $url = "?controller=userController";
        
        if(isset($POST["category"])){
            $url = $url . "&category=" . $POST["category"];
        }
        elseif(isset($POST["platform-filter"])){
            $url = $url . "&category=" . $POST["platform-filter"];
            $arr = array_values($POST);
            $selected_keys = array_slice($arr,0,-1);
            $selected_keys = implode(',',$selected_keys);
            $url = $url . "&selected=" . $selected_keys;
        }
        header("Location:$url");
    }

    function cardInfo($data){
        $success = 0;
        extract($data);
        $errors = [];
        if(isset($POST) && !empty($POST)){
            if(!$this->model->checkGivenToUser($POST['email'])){
                $errors[] = "Recivers Email not found"; 
            }
            if(($POST['value'] < 99) || ($POST['value'] > 10001)){
                $errors[] = "Invalid Amount Entered";
            }

            if(empty($errors)){
                $issued_at = date('Y-m-d H:i:s'); 
                $expire_at = date('Y-m-d H:i:s', strtotime('+1 year'));
                $POST["given_to"] = $this->model->getUserId($POST['email']);
                $this->model->buyCard(
                    $POST['value'],
                    $POST['platform_id'],
                    $POST['given_to'],
                    $POST['given_by'],
                    $POST['template_id'],
                    $expire_at
                );
                $success = 1;
            }
        }
        $cardInfo = $this->model->getCardInfo($params["card"]);
        $additionalTemplates = $this->model->getExtraTemplates();
        $this->render("buyPage", ["card_data" => $cardInfo, "temp_data" => $additionalTemplates, "errors" => $errors, "success" => $success]);
    }


    function myGiftCards(){
        $user_id = $_SESSION["user_id"];
        $giftcards = $this->model->userGiftCards($user_id);
        foreach($giftcards as &$card){
            $template_id = $this->model->getPlatformTemplate($card["platform_id"]);
            $template_data = $this->model->getTemplateData($template_id);
            $card["image_path"] = $template_data['path'];
            $card["platform_name"] = $template_data["name"];
        }
        unset($card);
        $this->render("myGiftCards", ["giftcards" => $giftcards]);
    }

    function userProfile(){
        $user_id = $_SESSION["user_id"];
        $this->render('userProfilePage');
    }
}
