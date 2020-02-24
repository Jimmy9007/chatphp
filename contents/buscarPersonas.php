<?php
 extract($_REQUEST);
    $idSession = $_SESSION['id'];

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    require_once '../../app/models/AmigosModel.php';
    
    $amigos_model = new AmigosModel();
    $per_model  = new PersonaModel();
    $dataAmigos = $amigos_model->readFriendByIdLogueadoEnBuscarPersona($idSession);
    $data = $per_model->readAllUsers();


?>
<section class="sectionBuscarAmigos">

<div id="BuscarUsuario">
    <input type="text" id="inputBuscarUsuario" title="Busca por nombre o edad" placeholder='Busca amigos'/>
</div>
<div class="usuariosBaseDatos">
<?php
    foreach ($dataAmigos as $amigos) {
        $amigos = $amigos['id'];
   }


    foreach ($data as $user) {
     $id = $user['id']."<br>";
    $nombre = $user['nombre'];
    $apellido = $user['apellido'];
    $fechaN = $user['fechaNac'];
    $foto = $user['foto'];
    $online = $user['online'];

    if ($online === 1) {
    $online = "<span id='imgOnline'></span>"; //punto online.
    }
    else{
        $online = "";   
    }

    ?>
 <div class="usuario"  id='user<?php echo $id?>' data-id='<?php echo $id ?>' data-idsession='<?php echo $idSession ?>'>
        <span class="spanNombreApellido"><?php echo ucfirst($nombre)." ".ucfirst($apellido)."&nbsp;&nbsp;".$online?></span>
         <img src="../../img/icon/addFriend.png" class="addFriend" id='btnStatusRequestFriend<?php echo $id?>' title="Agregar">
        <img src="../../img/profile/<?php echo $foto ?>" class='miniaturaFotoPerfil'/>
</div>
<?php }

?>
</div>

<div class="usuarios"></div>
</section>
<div id="ajax"></div>

