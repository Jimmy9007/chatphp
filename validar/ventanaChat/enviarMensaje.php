<?php
 $id = $_REQUEST['id'];
 $idSession = $_REQUEST['idSession'];
$mensaje = $_REQUEST['mensaje'];

require_once '../../app/class/Conexion.php';
require_once '../../app/models/MensajesModel.php';
$mensajes_model = new MensajesModel();
$mensajes_model->enviarMensajesByAmigos($idSession,$id,$mensaje);
