<?php
extract($_REQUEST); 
session_start();
$idSession = $_SESSION['id'];
$keyword = $_REQUEST["keyword"];

require_once '../app/class/Conexion.php';
require_once '../app/models/PersonaModel.php';
$perModel = new PersonaModel();
$data = $perModel->searchUserAjax($keyword);

if (empty($data)) {
    echo "No se encontraron resultados para: "."<span class='resultBusqueda'>".$keyword."</span>";    
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
    <div class="usuario" data-id='<?php echo $id ?>' data-idsession='<?php echo $idSession ?>'>
        <span class="spanNombreApellido"><?php echo ucfirst($nombre)." ".ucfirst($apellido).", ".$fechaN."&nbsp;&nbsp;".$online?></span>
        <img src="../../img/icon/addFriend.png" class="addFriend" title="Agregar">
        <img src="../../img/profile/<?php echo $foto ?>" class='miniaturaFotoPerfil'/>
    </div>
<?php } ?>
<script type="text/javascript">
      $('.usuario').click(function(){
      var id = $(this).data('id');
      window.location.href= "../../private/client/index.php?opt=profileBD&id="+id;
     });
  $(".addFriend").click(function(e){
    e.stopPropagation();

    var data = new Object();
    var id = $(this).parent().data('id');
    var idUserLogin = $(this).parent().data('idsession');

    $.ajax({
      url: '../../validar/friends/createFriendRequest.php?id='+id+'&idUserLogin='+idUserLogin,
      data: data,
      method: "POST",
      dataType: "html",
      success: function(data){   
        
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  });
</script>