<?php
    $id = $_REQUEST['idUsuario'];
    $foto = $_REQUEST['nombreFoto'];
    extract($_REQUEST);

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();
    
    $persona_model->updateFoto($id, $foto);
  
  //esta funcion sirve para copiar un archivo de un directorio a otro.
  $origen = "../../img/galeria/".$foto;
  $destino = "../../img/profile/";

  copy($origen, $destino.$foto);
?>