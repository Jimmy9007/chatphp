<?php
    $id = $_REQUEST['idUsuario'];
    $portada = $_REQUEST['nombreFoto'];
    extract($_REQUEST);

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();

    $persona_model->updatePortada($id, $portada);
    


    
    
?>