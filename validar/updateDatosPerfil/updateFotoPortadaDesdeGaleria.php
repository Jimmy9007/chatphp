<?php
    $id = $_REQUEST['idUsuario'];
    $portada = $_REQUEST['nombreFoto'];
    extract($_REQUEST);

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    $persona_model = new PersonaModel();
    
    $persona_model->updatePortada($id, $portada);
  
  //esta funcion sirve para copiar un archivo de un directorio a otro.
  $origen = "../../img/galeria/".$portada;
  $destino = "../../img/portada/";

  copy($origen, $destino.$portada);
?>