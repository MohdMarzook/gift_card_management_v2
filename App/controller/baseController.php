<?php

namespace App\controller;

use App\database\dbConnection;

class baseController{

    private $viewPath;
    private $dbconnection;

    function __construct($viewpath) {
        // require_once "App/database/connection.php";
        $this->viewPath = $viewpath;
        $db = new dbConnection;
        $this->dbconnection = $db->getConnection();
    }

    function model($model) {
        require_once "App/models/$model.php";
        return new $model($this->dbconnection);
    }

    function render($page, $data = []) {
        if (!empty($data)) {
            extract($data);
        }
        
        $header = $this->viewPath . 'layouts/header.php';
        $content = $this->viewPath . 'page/'. $page . '.php';
        $footer = $this->viewPath . 'layouts/footer.php';
        
        if (file_exists($header)) {
            require_once($header);
        }
        require_once($content);
        if (file_exists($footer)) {
            require_once($footer);
        }
    }

}