<?php
echo $idUser = $_REQUEST['idUser'];
echo $idUserLogin = $_REQUEST['idUserLogin'];
echo $idUser2 = $_REQUEST['idUserLogin'];
echo $idUserLogin2 = $_REQUEST['idUser'];

require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
$amigosModel = new AmigosModel();
$amigosModel->deleteAmistadAceptada($idUserLogin,$idUser,$idUserLogin2,$idUser2);
