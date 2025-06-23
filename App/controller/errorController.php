<?php

namespace App\controller;

class errorController extends baseController {
    
    private $viewPath = "App/views/errors/";
    
    function __construct() {
        parent::__construct($this->viewPath);
    }
    
    function notFound($data = []) {
        http_response_code(404); // Set HTTP status code to 404
        $error_message = $data['error_message'] ?? null;
        $this->render("404Page", ["error_message" => $error_message]);
    }
}