<?php
echo "<span class='txtNotificacionesDeAmigos'>Notificaciónes de amistad</span>";
session_start();
$idSession = $_SESSION['id'];
require_once '../../app/class/Conexion.php';
require_once '../../app/models/AmigosModel.php';
$amigos_model = new AmigosModel();
$solAmistad = $amigos_model->readSolicitudAmistadByUser($idSession);

foreach ($solAmistad as $readNotifAmistad) {
    $nombreUsu = $readNotifAmistad['nombre'];
    $apellidoUsu = $readNotifAmistad['apellido'];
    $edadUsu = $readNotifAmistad['fechaNac'];
    $fotoUsu = $readNotifAmistad['foto'];
    $id = $readNotifAmistad['id'];   


?>
<div class="divUsuariosNotificaciones" data-id='<?php echo $id?>'  data-idsession='<?php echo $idSession ?>' id='solicitud<?php echo $id?>'>
    <span class="spanNombreApellidoAmistad" data-id='<?php echo $id ?>'><?php echo ucfirst($nombreUsu)." ".ucfirst($apellidoUsu).", ".$edadUsu?></span>
    <img src="../../img/icon/addFriend.png" class="optionMiniaturaAmistad addFriend" id='btnStatusRequestFriend<?php echo $id?>'>
    <img src="../../img/icon/duplicado.png" class="optionMiniaturaAmistad deleteFriend">
    <img src="../../img/profile/<?php echo $fotoUsu ?>" class='fotoUsuarioPreview'/>
</div>

<script type="text/javascript">
//evenrto al darle en el nombre de la persona que solicita amistad
    $('.spanNombreApellidoAmistad').click(function(){
       var id = $(this).data('id');
       window.location.href= "../../private/client/index.php?opt=profileBD&id="+id;
    });

$(".addFriend").click(function(e){
    e.stopPropagation();

    var data = new Object();
    var idUserLogin = $(this).parent().data('id'); //aqui se cambia las cosas porque es al contrario de enviar la solicitud
    var idUser = $(this).parent().data('idsession');

    $.ajax({
      url: '../../validar/friends/updateFriendRequest.php?idUser='+idUser+'&idUserLogin='+idUserLogin,
      data: data,
      method: "POST",
      dataType: "html",
      success: function(data){
      }
    });

  });
  $(".deleteFriend").click(function(e){

    var data = new Object();
    var idUserLogin = $(this).parent().data('id'); //aqui se cambia las cosas porque es al contrario de enviar la solicitud
    var idUser = $(this).parent().data('idsession');

    $.ajax({
      url: '../../validar/friends/deleteFriendRequest.php?idUser='+idUser+'&idUserLogin='+idUserLogin,
      data: data,
      method: "POST",
      dataType: "html",
      success: function(data){
        $('#solicitud'+idUserLogin).slideUp('2000');   
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  }); 
</script>

<?php  } ?>