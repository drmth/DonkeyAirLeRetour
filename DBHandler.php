<?php

class DBHandler {
    private $db;

    function __construct()
    {
        $this->connect_database();
    }

    public function getInstance() {
        return $this->db;
    }

    private function connect_database() {
        define('USER', 'root');
        define('PASSWORD', "");
        define('DSN', 'mysql:host=localhost;dbname=donkeyair');

        try {
            $connection_array = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            );

            $this->db = new PDO(DSN, USER, PASSWORD, $connection_array);
        }
        catch(PDOException $e) {
            $this->db = null;
        }
    }   
}