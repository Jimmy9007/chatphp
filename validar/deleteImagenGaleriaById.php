<?php
extract($_REQUEST);
$id = $_REQUEST['id'];
$idUsuario = $_REQUEST['idUsuario'];

require_once '../app/class/Conexion.php';
require_once '../app/models/GaleriaModel.php';
$galeria_model = new GaleriaModel();
$galeria_model->delete_imagen($id, $idUsuario);
