<?php
namespace App\database;

include "./App/config/dbConfig.php";

class dbConnection{
 
    private $connection;


    function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->connection = new \PDO($dsn, DB_USER, DB_PASS);   
    }
    function getConnection() {
        return $this->connection;
    }
}