<?php 

class user_model {
    private $table;
    private $users;
     
    public function __construct(){
        $this->table="usuarios";
        parent::__construct($this->table);
        $this->users = array();
    }
     
    //Metodos de consulta

    public function getUnUsuario(){
        $query="SELECT * FROM usuario WHERE email='victor@victor.com'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }

}



?>