<?php
    echo $id = $_REQUEST['keyword'];
    echo $genero = $_REQUEST['genero'];
    extract($_REQUEST);

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();

        $persona_model->updateGenero($id,$genero);
    
?>