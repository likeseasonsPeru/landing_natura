<?php

class turn_model {

    private $ID
    private $coupons;
    private $full;
    private $hour;
    private $date;

    public function __construct(){
        $table="turno";
        parent::__construct($table);
    }

    public function getID(){
        return $this->ID;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function getCoupons(){
        return $this->coupons;
    }

    public function setCoupons($coupons){
        $this->coupons = $coupons;
    }

    public function getFull(){
        return $this->full;
    }

    public function setFull($full){
        $this->full = full;
    }

    public function getHour(){
        return $this->hour;
    }

    public function setHour($hour){
        $this->hour=$hour;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

}

?>