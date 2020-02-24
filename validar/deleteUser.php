<?php
    extract($_REQUEST);
$id = $_REQUEST['id'];

	require_once '../app/class/Conexion.php';
    require_once '../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();
    $data = $persona_model->delete_user($id);

header("location: ../private/admin/index.php");