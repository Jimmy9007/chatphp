<?php

class GaleriaModel {

    private static $instancia;
    private $dbh;
    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }
     public function createGaleriaByIdUser($nombre,$idUsuario) {
        
        try {
            $sql = "insert into galeria values(null,?,?)";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $idUsuario);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();            
        }
    }
    public function readFotosGaleriaByIdUsuario($id){
        try{
            $sql = "SELECT * FROM galeria WHERE idUsuario = ? ORDER BY id DESC";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function readCantFotosGaleriaByIdUsuario($id){
        try{
            $sql = "SELECT count(*) FROM `galeria` WHERE idUsuario = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function delete_imagen($id, $idUsuario) {
        try {
            $sql = "DELETE FROM `galeria` WHERE id = ? and idUsuario = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $idUsuario);
            $query->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
} //cierre de clase