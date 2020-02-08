<?php

require_once '../config/conexion.php';

class EntidadBase extends Conexion{
    private $table;
    private $db;

    public function __construct($table) {
        $this->table=(string) $table;
        parent::__construct();
        $this->db=$this->dbConnection();
    }

    public function db(){
        return $this->db;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table");
        //Devolvemos el resultset en forma de array de objetos
        while ($row = $query->fetchAll()) {
           $resultSet[]=$row;
        }
        return $resultSet;
    }

    public function getBy($column,$value){
        $query=$this->db->query("SELECT * FROM $this->table WHERE $column='$value'");
        if ($query == true){
            $resultSet[]=$query->fetch(PDO::FETCH_ASSOC);
            return $resultSet;
        }else {
            return null;
        }
    }

    // Update one by ...

    public function updateOne($column, $value, $columnCon, $valueCon){
        $query=$this->db->query("UPDATE $this->table SET $column='$value' WHERE $columnCon = '$valueCon'");
    }

    public function ejecutarSql($query){
        $query=$this->db()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetchAll()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetchAll()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
        return $resultSet;
    }
}
?>
