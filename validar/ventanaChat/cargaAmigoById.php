<?php
$id = $_REQUEST['id'];
$idSession = $_REQUEST['idSession'];


require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
require_once '../../app/models/MensajesModel.php';
$amigos_model = new AmigosModel();

$readDatosF = $amigos_model->readFrienClickChat($id,$idSession);


$return = new stdClass();
$return->bandera = false;
$return->msg = "<span id='txtLoginIncorrecto'>El usuario o la contraseña no coinciden.</span>";
$return->id = 0;

    foreach ($readDatosF as $row) {
    $online = $row['online'];  
	if ($online === 1) {
	    $online = "<span id='imgOnlineVentanaChat'></span>"; //punto online.
	}
else{
    $online = "";   
}
    $return->bandera = true;
    $return->msg1 = "<span>El usuario ya existe.</span>";
    $return->nombre = $online.ucfirst($row["nombre"])." ".ucfirst($row['apellido']);
    $return->id = $row['idUser'];
    }
/**/
$json = json_encode($return);
echo $json;
?>