<?php
extract($_REQUEST); 
session_start();
$idSession = $_SESSION['id'];
$keyword = $_REQUEST["keyword"];

require_once '../app/class/Conexion.php';
require_once '../app/models/AmigosModel.php';
$amigoModel = new AmigosModel();
$data = $amigoModel->searchUserAjax($idSession,$keyword);

if (empty($data)) {
    echo "No se encontraron resultados con: "."<span class='resultBusqueda'>".$keyword."</span>";    
}
   foreach ($data as $user) {
    $id = $user['id'];
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
<div class="divUsuariosNotificaciones divAmigosOnlineChat" data-id='<?php echo $id?>'  data-idsession='<?php echo $idSession ?>' id='solicitud<?php echo $id?>'>
    <span class="spanNombreApellidoAmistad" id="textoChatAmigosOnline" data-id='<?php echo $id ?>' alt='enviar solicitud'><?php echo ucfirst($nombre)." ".ucfirst($apellido).$online?></span>
    <img src="../../img/profile/<?php echo $foto ?>" class='fotoUsuarioPreview'/>
</div>
<?php } ?>
<script type="text/javascript">
   
</script>