<?php
    session_start();
     $idSession = $_SESSION['id'];

    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/AmigosModel.php';
    $amigos_model = new AmigosModel();
    $online = $amigos_model->readFriendByOnline($idSession);

foreach ($online as $readNAmigosOnline) {
    $nombreUsu = $readNAmigosOnline['nombre'];
    $apellidoUsu = $readNAmigosOnline['apellido'];
    $edadUsu = $readNAmigosOnline['fechaNac'];
    $fotoUsu = $readNAmigosOnline['foto'];
    $id = $readNAmigosOnline['id'];   
    $online = $readNAmigosOnline['online'];

if ($online === 1) {
    $online = "<span id='imgOnline'></span>"; //punto online.
}
else{
    $online = "";   
}
?>
<div class="divUsuariosNotificaciones divAmigosOnlineChat" data-id='<?php echo $id?>'  data-idsession='<?php echo $idSession ?>' id='solicitud<?php echo $id?>'>
    <span class="spanNombreApellidoAmistad" id="textoChatAmigosOnline" data-id='<?php echo $id ?>' alt='enviar solicitud'><?php echo ucfirst($nombreUsu)." ".ucfirst($apellidoUsu).$online?></span>
    <img src="../../img/profile/<?php echo $fotoUsu ?>" class='fotoUsuarioPreview'/>
</div>
<?php } ?>



<script type="text/javascript">
$.ajaxSetup({'cache':false});
setInterval("cargarMensajes()",500);


      $('.divAmigosOnlineChat').click(function(){

        var id = $(this).data('id');
        var idSession = $(this).data('idsession');

       $.ajax({
        url: '../../validar/ventanaChat/cargaAmigoById.php?id='+id+'&idSession='+idSession,
        method: 'POST',
        dataType: 'json',
        success: function(data){

            $('.ventanaChat').show();
            $('#inputNuevoMensaje').attr('data-id',''+data.id+'');
            $('.linkToProfileAmigo').html(data.nombre);

        },
        error: function(e){
            alert("error");
        }
       });

      });


     $('#inputNuevoMensaje').focus();
     $('#inputNuevoMensaje').keypress(function(tecla){
        if (tecla.keyCode == 13) {
        var id = $('#inputNuevoMensaje').data('id');
        var idSession = $('.divAmigosOnlineChat').data('idsession');
        var mensaje = $(this).val();
        $.ajax({
        url: '../../validar/ventanaChat/enviarMensaje.php?id='+id+'&idSession='+idSession+'&mensaje='+mensaje,
        method: 'POST',
        dataType: 'html',
        success: function(data){
            $('#inputNuevoMensaje').val("");
        },
        error: function(){
            alert("error");
        }
       });
    }
});

      var cargarMensajes = function(){

        var id = $('#inputNuevoMensaje').data('id');
        var idSession = $('.divAmigosOnlineChat').data('idsession');
    $.ajax({
        type: 'POST',
        url: '../../validar/ventanaChat/cargarMensajes.php?id='+id+'&idSession='+idSession,
        success: function(data){

            $('.cajaMensajes').html(data);
            var altura = $('.cajaMensajes').prop("scrollHeight");
            $('.cajaMensajes').scrollTop(altura);

        }
    });
    }

$('.linkToProfileAmigo').click(function(){
    var id = $('#inputNuevoMensaje').data('id');
    window.location.href= "../../private/client/index.php?opt=profileBD&id="+id;
});
</script>