<?php
session_start();

require_once '../app/class/Conexion.php';
require_once '../app/models/PersonaModel.php';
$personaModel = new PersonaModel();
$online = 0;
$id = $_SESSION['id'];
$personaModel->updateStadoOnline($id,$online);
session_destroy();
header("location: ../");
?>
