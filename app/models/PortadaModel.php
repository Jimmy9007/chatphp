<?php

class PortadaModel {

    private static $instancia;
    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }
    public function readPortada(){
        try{
            $sql = "select * from imgportada";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}//close class