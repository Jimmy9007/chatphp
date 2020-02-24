<?php
    echo $idUsuario = $_REQUEST['id'];
    extract($_REQUEST);

    require_once '../app/class/Conexion.php';
    require_once '../app/models/GaleriaModel.php';
    $galeria_model = new GaleriaModel();

    foreach ($_FILES as $key) {
       
    $nombre = $key['name'];
    $temporal = $key['tmp_name'];
    $path = "../img/galeria/";
    $name_ran = rand(1000, 9999);
    $destino = $path.$nombre;

    move_uploaded_file($temporal, $destino);
    $galeria_model->createGaleriaByIdUser($nombre,$idUsuario);

    }
    
?>