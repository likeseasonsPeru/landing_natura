<?php

class User extends EntidadBase {

    private $dni;
    private $name;
    private $turno;
    private $email;
    private $registered;

    public function __construct(){
        $table="usuario";
        parent::__construct($table);
    }

    public function getDNI(){
        return $this->dni;
    }

    public function setDNI($DNI){
        $this->dni = $DNI;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getTurno(){
        return $this->turno;
    }

    public function setTurno($turno){
        $this->turno = turno;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email=$email
    }

    public function getRegistered(){
        return $this->registered;
    }

    public function setRegistered($registered){
        $this->registered = $registered;
    }

    /*
    public function save(){
        $query="INSERT INTO usuarios (DNI,Nombre,Email,Registered,Turno_ID)
                VALUES('".$this->dni."',
                       '".$this->name."',
                       '".$this->email."',
                       '".$this->registered."',
                       '".$this->turno."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    */

}

?>