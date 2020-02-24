<?php
$idUser = $_REQUEST['idUser'];
$idUserLogin = $_REQUEST['idUserLogin'];
$status = 1;

require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
$amigosModel = new AmigosModel();
     $amigosModel->updateSolicitudAmistad($status,$idUserLogin,$idUser);


     $idUser = $_REQUEST['idUserLogin'];
     $idUserLogin = $_REQUEST['idUser'];
     $amigosModel->createfriendRequest($idUserLogin,$idUser,$status);
//acepta solicitud de amistad.