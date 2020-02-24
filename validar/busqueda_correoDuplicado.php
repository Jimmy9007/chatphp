<?php
$correo = $_REQUEST["keyword"];

require_once '../app/class/Conexion.php';
require_once '../app/models/PersonaModel.php';
$personaModel = new personaModel();
$data = $personaModel->buscarCorreoDUplicado($correo);

$return = new stdClass();
$return->bandera = false;
$return->msg = "El correo no existe.";
$return->id = 0;

foreach ($data as $row) {
	$return->bandera = true;
	$return->msg1 = "<span id='txtCorreoYaExiste'>El correo ya existe.</span>";
	$return->id = $row["id"];							
}

$json = json_encode($return);
echo $json;

?>