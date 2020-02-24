<?php
    echo $id = $_REQUEST['keyword'];
    echo $fechaNac = $_REQUEST['fechaNac'];
    extract($_REQUEST);

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();

        $persona_model->updateFechaNac($id, $fechaNac);
    
?>