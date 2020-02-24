<?php
session_start();
$id = $_SESSION['id'];

require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
$amigos_model = new AmigosModel();
$cantAmigos = $amigos_model->readCantFriendByIdLogueado($id);

    foreach ($cantAmigos as $cant) {
        $cant = $cant['count(*)'];
            echo $cant;
    }

    
