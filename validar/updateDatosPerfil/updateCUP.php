<?php
    echo $id = $_REQUEST['keyword'];
    echo $correo = $_REQUEST['correo'];
    echo $username = $_REQUEST['username'];
    echo $pass = $_REQUEST['pass'];
    extract($_REQUEST);

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();
    $data = $persona_model->read_user_by_id($id);

    foreach ($data as $user) {
        $oldPass = $user['pass'];
    }

    if ($pass === $oldPass) {
        $persona_model->updateCUP($id, $correo, $username, $pass);
    }
    else{
        $persona_model->updateCUP($id, $correo, $username, md5($pass));
    }
    
?>