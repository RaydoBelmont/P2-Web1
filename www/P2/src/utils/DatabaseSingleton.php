<?php

namespace App\utils;

class DatabaseSingleton
{
    private static $instance;
    private $conn;
    private $server = "db-mysql";
    private $user = "root";
    private $pass = "root";
    private $mydb = "cinemas";

    private function __construct()
    {
        $this->conn = new \mysqli($this->server, $this->user, $this->pass, $this->mydb);

        if ($this->conn->connect_error) {
            die("Conexão falhou: " . $this->conn->connect_error);
        }
    } 

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(){
        return $this->conn;
    }

    private function __clone(){}

    private function __wakeup(){}
}
