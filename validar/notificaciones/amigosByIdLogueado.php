<?php
session_start();
$id = $_SESSION['id'];
$idUserLogin = $_SESSION['id'];

require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
$amigos_model = new AmigosModel();
$dataAmigos = $amigos_model->readFriendByIdLogueado($id,$idUserLogin);

    foreach ($dataAmigos as $user) {
     $nombre = $user['nombre'];
     $apellido = $user['apellido'];
     $fechaN = $user['fechaNac'];
     $foto = $user['foto'];
     $idUserAmigo = $user['id'];
/*     $cantAmigos = $user['count(*)'];*/
?>

<div class="usuario"  id='user<?php echo $idUserAmigo?>' data-idamigo='<?php echo $idUserAmigo ?>' data-id='<?php echo $id?>'>
    <span class="spanNombreApellido"><?php echo ucfirst($nombre)." ".ucfirst($apellido).", ".$fechaN?></span>
    <img src="../../img/icon/deleteFriend.png" class="deleteFriend" id='deleteFriend<?php echo $id?>' title="Eliminar">
    <img src="../../img/profile/<?php echo $foto ?>" class='miniaturaFotoPerfil'/>
</div>

  <?php }  ?>

</div>
<script type="text/javascript">
  $(".usuario").click(function(){
       var id = $(this).data('idamigo');
       window.location.href= "../../private/client/index.php?opt=profileBD&id="+id;
      });
    $(".deleteFriend").click(function(e){
    e.stopPropagation();

    var data = new Object();
    var id = $(this).parent().data('id');
    var idUserLogin = $(this).parent().data('idamigo');
    var parent = $(this).parent().attr('id');
    $.ajax({
      url: '../../validar/friends/deleteAmistadAceptada.php?idUser='+id+'&idUserLogin='+idUserLogin,
      data: data,
      method: "POST",
      dataType: "html",
      success: function(data){   
        $('#'+parent).fadeOut();
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  });

</script>