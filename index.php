<?php
// Auto-loading classes
spl_autoload_register(function($class) {
    $basedir = __DIR__ . "\\";
    $file = $basedir . $class . '.php';
    if (file_exists($file)) {
        require $file;  
    }
});
session_start();

class Index {
    public $controller;
    public $action = "";
    public $params = [];

    function parseUrl($params) {
        $this->controller = isset($params["controller"]) ? ucfirst($params["controller"]) : "authController";
        $this->action = isset($params["action"]) ? $params["action"] : "index";
        $this->params = $params;
    }   
    // function parseUrl($params) {
    //     print_r($params);
    // }

    function __construct() {

        $this->parseUrl($_GET);
        
        // echo "Controller: ";
        // print_r($this->controller);
        // echo "<br>Action: ";
        // print_r($this->action);
        // echo "<br>";
        $controllerClassName = 'App\\controller\\' . $this->controller;
        
        if (class_exists($controllerClassName)) {
            $controller = new $controllerClassName();
            
            if (method_exists($controller, $this->action)) {
                if(!(isset($_POST))){
                    $_POST = [];
                }
                $controller->{$this->action}(["params" => $this->params, "POST" => $_POST , "FILES" => $_FILES]);
            } else {
                // echo "Action '{$this->action}' not found in controller '{$this->controller}'";
                $errorController = new App\controller\errorController();
                $errorController->notFound([
                    "error_message" => "Action '{$this->action}' not found in controller '{$this->controller}'"
                ]);
            }
        } else {
            // echo "Controller '{$this->controller}' not found";
            $errorController = new App\controller\errorController();
            $errorController->notFound([
                "error_message" => "Controller '{$this->controller}' not found"
            ]);
        }
    }
}

$object = new Index();






