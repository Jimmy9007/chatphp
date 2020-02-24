<?php
echo $idUser = $_REQUEST['idUser'];
echo $idUserLogin = $_REQUEST['idUserLogin'];

require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
$amigosModel = new AmigosModel();
$data = $amigosModel->deleteSolicitudAmistad($idUserLogin,$idUser);
