<?php

class MensajesModel {

    private static $instancia;
    private $dbh;
    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }
        public function enviarMensajesByAmigos($idSession,$id,$mensaje){
        try{
            $sql = "insert into mensajes values(null,?,?,?)";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $idSession);
            $query->bindParam(2, $id);
            $query->bindParam(3, $mensaje);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function readMensajesByAmigos($id,$idSession,$idSession2,$id2){
        try{
            $sql = "select m.*,u.foto from mensajes as m inner join usuario as u on m.idUserLogin = u.id where m.idUser=? and m.idUserLogin=? or m.idUserLogin=? and m.idUser= ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $idSession);
            $query->bindParam(3, $idSession2);
            $query->bindParam(4, $id2);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}//close class