<?php 

class turns_model {

    private $db
    private $turns

    public function __construct(){
        $this->db=api::dbConnection();
        $this->turns=array();
    }

    public function getTurns() {
        $consulta=$this->db->query("select * from turno;");
        while($filas=$consulta->fetch_assoc()){
            $this->turns[]=$filas;
        }
        return $this->turns;
    }
}

?>