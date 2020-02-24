<?php
    $id = $_REQUEST['id'];
    extract($_REQUEST);

    
    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();

    $user = $persona_model->read_user_by_id($id);
    foreach ($user as $key) {
       $fotoBD = $key['foto'];
    }
    $path = "../../img/profile/";
    $foto = $_FILES["foto"]["name"];
    $size = $_FILES['foto']['size'];
    $tamaño_max="58803";

    if ($size > 0) {
        move_uploaded_file(
            $_FILES["foto"]["tmp_name"], ($path . $foto));
    $persona_model->updateFoto($id, $foto);

     echo $foto;

    }
?>