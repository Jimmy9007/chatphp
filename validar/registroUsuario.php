<?php
/*extract($_REQUEST);
require_once '../app/models/PersonaModel.php';
	$persona_model = PersonaModel::singleton();
	$data = $persona_model->read_users();
*/
extract($_REQUEST);

$portada = $_REQUEST['portada'];

require_once '../app/class/Conexion.php';
require_once '../app/models/PersonaModel.php';
$personaModel = new PersonaModel();

$photo = $_FILES["foto"]["name"];
$online = 1;


 if ($photo === "") {
        $foto =  $_REQUEST['foto2'];

 }
 else{
     $path = "../img/profile/"; 
     $foto = $_FILES["foto"]["name"];

        move_uploaded_file(
                $_FILES["foto"]["tmp_name"], 
                ($path.$foto));
 }
        $personaModel->create_user($nombre,$apellido,$fechaNac,$genero,$correo,$username,md5($pass),$foto,$portada,$online);


 session_start();
$redirect = "";
$user = $personaModel->validar_usuario($username, md5($pass));

if (is_array($user)) {
    
    echo $_SESSION["id"] = $user["id"];
    echo $_SESSION["username"] = $user["username"];
    echo $_SESSION["nombre"] = $user["nombre"];
    echo $_SESSION["apellido"] = $user["apellido"];
    echo $_SESSION["foto"] = $user["foto"];

$online = 1;
$id = $user['id'];
$personaModel->updateStadoOnline($id,$online); 

        $redirect = "location: ../private/client/";
    }
header($redirect);

/*NO PUDE SUBIR UNA IMAGEN VIA AJAX....AVERIGUAR EN EL FUTURO---solucionado...si se puede con ajax con FORMDATA*/