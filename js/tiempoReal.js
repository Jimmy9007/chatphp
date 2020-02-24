$(document).ready(function(){
    setInterval("cargarNotificaciones()",3000);
    setInterval("cargarCantidadNotificaciones(),cargarCantidadAmigos()",1000);
    setInterval("cargarAmigosByIdLogueado()",3000);
    setTimeout("cargarAmigosOnline()",1000);
});
var cargarNotificaciones = function(){
    $.ajax({
        type: 'POST',
        url: '../../validar/notificaciones/notificacionesAmistad.php',
        success: function(data){

            $('.usuarioSolicAmistad').html(data);
        }
    });
}

var cargarCantidadNotificaciones = function(){
    $.ajax({
        type: 'POST',
        url: '../../validar/notificaciones/cantidadNotificacionesAmistad.php',
        dataType: 'json',
        success: function(data){
            

                setTimeout(cambioDinamico,1000);

           function cambioDinamico(){
           $("title").text(data.tituloNombre);
           }
             
            if (data.numNotifAmistad > 0) {
                
                 $("title").text(data.tituloPagina);
            $('.spanCantidadSolicitudesAmistad').html(data.numNotifAmistad).show();
            $('#iconNotifSolAmistad').css('-webkit-filter','brightness(100%)');
             }else{
           $('.spanCantidadSolicitudesAmistad').hide();
                $('#iconNotifSolAmistad').css('-webkit-filter','brightness(20%)');
             }  
        }
        
    });

}

var cargarCantidadAmigos = function(){
    $.ajax({
        type: 'POST',
        url: '../../validar/notificaciones/cantidadAmigos.php',
        success: function(data){

            if (data > 0 && data <2) {
            $('.spanCantidadAmigos').html(data+' Amigo'); 
        }
        else if (data> 1) {
            $('.spanCantidadAmigos').html(data+' Amigos');
        }
        else{
            $('.spanCantidadAmigos').html(data+' Amigos');
        }
        }
    });

}
var cargarAmigosByIdLogueado = function(){
    $.ajax({
        type: 'POST',
        url: '../../validar/notificaciones/amigosByIdLogueado.php',
        success: function(data){
            $('#amigosByidLogueado').html(data);
        }
    });

}
var cargarAmigosOnline = function(){
    $.ajax({
        type: 'POST',
        url: '../../validar/notificaciones/cargarAmigosChat.php',
        success: function(data){
            $('#amigosConectados').html(data);
        }
    });
}

