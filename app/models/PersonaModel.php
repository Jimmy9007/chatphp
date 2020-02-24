<?php

class PersonaModel {

    private static $instancia;
    private $dbh;
    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }
    //Definicion del CRUD
    public function create_user($nombre,$apellido,$fechaNac,$genero,$correo,$username,$pass,$foto,$portada,$online) {
        
        try {
            $sql = "insert into usuario values(null,?,?,?,?,?,?,?,?,?,?)";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $apellido);
            $query->bindParam(3, $fechaNac);
            $query->bindParam(4, $genero);
            $query->bindParam(5, $correo);
            $query->bindParam(6, $username);
            $query->bindParam(7, $pass);
            $query->bindParam(8, $foto);
            $query->bindParam(9, $portada);
            $query->bindParam(10, $online);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();            
        }
    }
    
    public function read_users() {
        try {
            $sql = "SELECT * FROM usuario ORDER BY id desc";
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function read_user_by_id($id){
        try{
            $sql = "select * from usuario where id=?";
            $query = $this->con->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function updateName($id, $nombre, $apellido) {
        
        try {
            $sql = "update usuario set "
                    ."nombre=?, "
                    ."apellido=? "
                    ."where id=?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $apellido);
            $query->bindParam(3, $id);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function updateGenero($id,$genero) {
        
        try {
            $sql = "update usuario set genero=? where id=?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $genero);
            $query->bindParam(2, $id);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function updateFechaNac($id,$fechaNac) {
        
        try {
            $sql = "update usuario set fechaNac=? where id=?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $fechaNac);
            $query->bindParam(2, $id);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function updateFoto($id, $foto) {
        
        try {
            $sql = "update usuario set "
                    ."foto=? "
                    ."where id=?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $foto);
            $query->bindParam(2, $id);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function updateStadoOnline($id,$online) {
        
        try {
            $sql = "update usuario set "
                    ."online=? "
                    ."where id=?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $online);
            $query->bindParam(2, $id);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function updatePortada($id, $portada) {
        
        try {
            $sql = "update usuario set "
                    ."portada=? "
                    ."where id=?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $portada);
            $query->bindParam(2, $id);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function updateCUP($id,$correo, $username, $pass) {
        
        try {
            $sql = "update usuario set "
                    ."correo=?, "
                    ."username=?, "
                    ."pass=? "
                    ."where id=?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $correo);
            $query->bindParam(2, $username);
            $query->bindParam(3, $pass);
            $query->bindParam(4, $id);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_user($id) {
        try {
            $sql = "delete from usuario where id=? ";
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
             return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function validar_usuario($username,$pass){
        try{
            $sql = "SELECT * FROM `usuario` where username = ? and pass = ?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $username);
            $query->bindParam(2, $pass);
            $query->execute();
            return $query->fetch();
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    } 
    public function validarUsuarioAntiguo($username,$pass){
        try{
            $sql = "SELECT * FROM `usuario` where username = ? and pass = ?";
            
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $username);
            $query->bindParam(2, $pass);
            $query->execute();
            return $query->fetchAll();
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }   
    public function editById($id){
        try{ 
        $sql = "select * from usuario where id = ?";
        
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function buscarCorreoDUplicado($correo){
        $sql = "Select * from usuario where correo = ?";
        try {
            $query = $this->con->prepare($sql);
            $query->bindParam(1, $correo);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function searchUserAjax($keyword){
        $sql = "SELECT id,nombre,apellido,fechaNac,foto,online FROM usuario where nombre like '%$keyword%' OR fechaNac like '%$keyword%'";
        try {
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }


//seccion para cargar personas en la base de datos.
    public function readAllUsers(){
        $sql = "SELECT id,nombre,apellido,fechaNac,foto,online FROM `usuario` ORDER BY id DESC";
        try {
            $query = $this->con->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

}//close class



?>
