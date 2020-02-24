<?php
$id = $_REQUEST['id'];
$idSession = $_REQUEST['idSession'];
$id2 = $_REQUEST['id'];
$idSession2 = $_REQUEST['idSession'];

require_once '../../app/class/Conexion.php';
require_once '../../app/models/MensajesModel.php';
$mensajes_model = new MensajesModel();
$readMensajes = $mensajes_model->readMensajesByAmigos($id, $idSession,$id2,$idSession2);

    foreach ($readMensajes as $data) {
    	$mensajes = $data['mensaje'];
    	$fotoUserLogin = $data['foto'];
    	 echo "<div class='separadorDeMensajes'><img class='fotoUserLogin' src='../../img/profile/$fotoUserLogin'><span class='divMensaje'>$mensajes</span></div>";	
    
    	 
    }