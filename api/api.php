<?php

// api

class API {
    private $db_host = 'localhost';
    private $db_name = 'landing_natura';
    private $db_username = 'root';
    private $db_password = '';

    public function __construct() {
        $this->db_host = 'localhost';
        $this->db_name = 'landing_natura';
        $this->db_username = 'root';
        $this->db_password = '';
    }

    public function dbConnection(){
        try{
            $conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name,$this->db_username,$this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($conn){
                echo 'DB connected';
            }
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection error ".$e->getMessage();
            exit;
        }
    }

}

?>