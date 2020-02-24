<?php
    $id = $_REQUEST['id'];
    extract($_REQUEST);

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();

    
    $path = "../../img/portada/";
    $portada = $_FILES["portada"]["name"];

    move_uploaded_file($_FILES["portada"]["tmp_name"], ($path . $portada));
    $persona_model->updatePortada($id, $portada);

    //imprimo el nombre de la imagen de portada.
    echo $portada;
    
    
?>