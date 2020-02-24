<?php
extract($_REQUEST);
    $idUser = $_REQUEST['id'];
    $idUserLogin = $_REQUEST['idUserLogin'];
    $status = 0;

require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
$amigosModel = new AmigosModel();

     $amigosModel->createfriendRequest($idUserLogin,$idUser,$status);

