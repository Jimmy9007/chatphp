<?php
    echo $id = $_REQUEST['keyword'];
    echo $nombre = $_REQUEST['nombre'];
    echo $apellido = $_REQUEST['apellido'];
    extract($_REQUEST);

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();

        $persona_model->updateName($id, $nombre, $apellido);
    
?>