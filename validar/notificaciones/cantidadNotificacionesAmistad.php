<?php
session_start();
$id = $_SESSION['id'];
$nombre = ucfirst($_SESSION['nombre'])." ".ucfirst($_SESSION['apellido']);

require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
$amigos_model = new AmigosModel();
$cantSolAmistad = $amigos_model->cantSolicitudesAmistad($id);

$return = new stdClass();
$return->bandera = false;
$return->msg = "<span id='txtLoginIncorrecto'>El usuario o la contraseña no coinciden.</span>";
$return->id = 0;

    foreach ($cantSolAmistad as $cantSolicitudes) {
        $cant = $cantSolicitudes['count(*)'];
	    $return->bandera = true;
	    if($cant > 0 && $cant < 2){
	    	$return->numNotifAmistad = $cant;
	    	$return->tituloPagina = "($cant) solicitud de amistad";
	    	$return->tituloNombre = $nombre;
	    }
	    else if($cant > 0){
	    	$return->numNotifAmistad = $cant;
	    	$return->tituloPagina = "($cant) solicitudes de amistad";
	    	$return->tituloNombre = $nombre;
	    }
	    else{
	    	$return->tituloPagina = $nombre;
	    	$return->tituloNombre = $nombre;
	    }

    }

/**/
$json = json_encode($return);
echo $json;
?>
