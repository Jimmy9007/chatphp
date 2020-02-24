<?php
session_start();
 $username = $_REQUEST['username'];
 $pass = $_REQUEST['pass'];

require_once '../app/class/Conexion.php';
require_once '../app/models/PersonaModel.php';
$personaModel = new PersonaModel();
$data = $personaModel->validarUsuarioAntiguo($username, md5($pass));

$return = new stdClass();
$return->bandera = false;
$return->msg = "<span id='txtLoginIncorrecto'>El usuario o la contraseña no coinciden.</span>";
$return->id = 0;

foreach ($data as $row) {
    $return->bandera = true;
    $return->msg1 = "<span>El usuario ya existe.</span>";
    $return->id = $row["id"];

    $_SESSION["id"] = $row["id"];
    $_SESSION["nombre"] = $row["nombre"];
    $_SESSION["apellido"] = $row["apellido"];
    $_SESSION["foto"] = $row["foto"];
$online = 1;
$id = $row['id'];
$personaModel->updateStadoOnline($id,$online);    
}   

/**/
$json = json_encode($return);
echo $json;
?>