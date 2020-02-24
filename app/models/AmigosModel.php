<?php

class AmigosModel {

    private static $instancia;
    private $dbh;
    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }
     public function createfriendRequest($idUserLogin,$idUser,$status) {
        
        try {
            $sql = "insert into amigos values(null,?,?,?)";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $idUserLogin);
            $query->bindParam(2, $idUser);
            $query->bindParam(3, $status);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();            
        }
    }
    public function readSolicitudAmistadByUser($idSession){
        try{
            $sql = "SELECT u.* FROM amigos as a  inner join usuario as u on a.idUserLogin = u.id  WHERE a.idUser = ? and a.status = 0";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $idSession);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function cantSolicitudesAmistad($id){
        try{
            $sql = "SELECT count(*) FROM `amigos` WHERE idUser = ? and status = 0";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function readFriendById($id){
        try{
            $sql = "SELECT * FROM `amigos` WHERE idUser = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
     public function readFrienClickChat($id,$idSession){
        try{
            $sql = "SELECT * FROM `amigos`as a inner join usuario as u on a.idUser = u.id WHERE idUser = ? and idUserLogin = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $idSession);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function readFriendByIdLogueado($id){
        try{
            $sql = "SELECT u.id,u.nombre,u.apellido,u.fechaNac,u.foto,u.online,a.idUserLogin,a.idUser,u.online FROM `amigos` as a inner join usuario as u on a.idUser = u.id where a.status = 1 AND a.idUserLogin = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readFriendByIdLogueadoEnBuscarPersona($idSession){
        try{
            $sql = "SELECT u.id FROM `amigos` as a inner join usuario as u on a.idUser = u.id where a.status = 1 AND a.idUserLogin = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $idSession);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function readFriendByOnline($idSession){
        try{
            $sql = "SELECT u.id,u.nombre,u.apellido,u.fechaNac,u.foto,u.online,a.idUserLogin,u.online FROM `amigos` as a inner join usuario as u on a.idUserLogin = u.id where a.status = 1 AND a.idUser = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $idSession);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function readEstadoOnlinePerfilDB($id){
        try{
            $sql = "SELECT u.id,u.nombre,u.apellido,u.fechaNac,u.foto,u.online,a.idUserLogin,u.online FROM `amigos` as a inner join usuario as u on a.idUserLogin = u.id where a.status = 1 AND a.idUser = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function readCantFriendByIdLogueado($id){
        try{
            $sql = "SELECT count(*) FROM `amigos` as a inner join usuario as u on a.idUserLogin = u.id where a.status = 1 AND a.idUser = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function updateSolicitudAmistad($status,$idUserLogin,$idUser) {
        try {
            $sql = "UPDATE `amigos` SET status = ? WHERE idUserLogin = ? and idUser = ?";
            $query = $this->con->prepare($sql);
             $query->bindParam(1, $status);
             $query->bindParam(2, $idUserLogin);
             $query->bindParam(3, $idUser);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function deleteSolicitudAmistad($idUserLogin,$idUser) {
        try {
            $sql = "DELETE FROM `amigos` WHERE idUserLogin = ? and idUser = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $idUserLogin);
            $query->bindParam(2, $idUser);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function deleteAmistadAceptada($idUserLogin,$idUser,$idUserLogin2,$idUser2) {
        try {
            $sql = "DELETE FROM `amigos` WHERE idUserLogin = ? and idUser = ? or idUserLogin = ? and idUser = ?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $idUserLogin);
            $query->bindParam(2, $idUser);
            $query->bindParam(3, $idUserLogin2);
            $query->bindParam(4, $idUser2);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function searchUserAjax($idSesison,$keyword){
        $sql = "SELECT u.id,u.nombre,u.apellido,u.fechaNac,u.foto,u.online,a.idUserLogin,u.online FROM `amigos` as a inner join usuario as u on a.idUserLogin = u.id where a.status = 1 AND a.idUser = '$idSesison' and u.nombre like '%$keyword%'";
        try {
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
    
} //cierre de clase