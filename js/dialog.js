$(document).ready(function(){

      $('.divAmigosOnlineChat').click(function(){
        console.log("clicK");
      });

//boton para cambiar imagen de portada...
  $(".btnCambiarPortada").click(function(){
     $("#blackScreen").show();
    $(".cambiarPortada").show();
    $(".sectionPerfil").css('top','-10.5em');

  });
//seleccionar imagen de fondo prediseñada o cargada de base de datos.---
  $(".imagenesDePortada").click(function(){
    var data = new Object();
    var idUsuario = $(this).data('id');
    var nombreFoto = $(this).data('nombre');

    $.ajax({
      url: '../../validar/updateDatosPerfil/updateImagenFondo.php?idUsuario='+idUsuario+'&nombreFoto='+nombreFoto,
      data: data,
      method: "POST",
      dataType: "html",
      success: function(data){
        $('#imagenDinamicaPortada').attr('src','../../img/portada/'+nombreFoto+'');
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  });
  //IMAGEN DE PERFIL ESCOGIDA DE GALERIA DE IMAGENES
    $(".imgSelectProfilePhoto").click(function(){
      var data = new Object();
      var idUsuario = $(this).data('idusuario');
      var nombreFoto = $(this).data('nombre');

    $.ajax({
      url: '../../validar/updateDatosPerfil/updateFotoPerfilDesdeGaleria.php?idUsuario='+idUsuario+'&nombreFoto='+nombreFoto,
      data: data,
      method: "POST",
      dataType: "html",
      success: function(data){
        $('.fotoPerfilTemporal').attr('src','../../img/galeria/'+nombreFoto+'');
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  });
    //IMAGEN DE PERFIL ESCOGIDA DE GALERIA DE IMAGENES
    $(".selectImPortada").click(function(){
      var data = new Object();
      var idUsuario = $(this).data('idusuario');
       var nombreFoto = $(this).data('nombre');
      $.ajax({
      url: '../../validar/updateDatosPerfil/updateFotoPortadaDesdeGaleria.php?idUsuario='+idUsuario+'&nombreFoto='+nombreFoto,
      data: data,
      method: "POST",
      dataType: "html",
      success: function(data){
        $('#imagenDinamicaPortada').attr('src','../../img/portada/'+nombreFoto+'');
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  });
  //funcion para boton mostrar datos personales...
  $("#imgSettings").click(function(){
      $("#imgSettings").css({
      transition: '0.4s ease-in',
      transform: 'rotate(50deg)'
    });
    setTimeout(function() {
        $("#formUpdateDatos").toggle();
    },500);

   habilitarBoton();
   $("#btnActualizarOtrosDatos").click(function(){
    var data = new Object();
    data.keyword = $(this).data('id');
    var username = $("#username").val();
    var pass = $("#pass").val();
    var correo = $("#correoUpdate").val();

    $.ajax({
      url: '../../validar/updateDatosPerfil/updateCUP.php?correo='+correo+'&username='+username+'&pass='+pass,
      method: "POST",
      data: data,
      dataType: "html",
      success: function(){
        opacarVentana();
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });
  });
     });

    $("#actualizarNombre").click(function(){
    var data = new Object();
    data.keyword = $(this).data('id');
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();

    $.ajax({
      url: '../../validar/updateDatosPerfil/updateNombre.php?nombre='+nombre+'&apellido='+apellido,
      method: "POST",
      data: data,
      dataType: "html",
      success: function(data){
        opacarVentana();
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });
  });
    $('#genero').on('change',function(){
      var genero = $(this).val();
      if (genero!='') {
        habilitarBoton();

        $("#actualizarGenero").click(function(){
          var data = new Object();
          data.keyword = $(this).data('id');
          $.ajax({
            url: '../../validar/updateDatosPerfil/updateGenero.php?genero='+genero,
            method: "POST",
            data: data,
            dataType: "html",
            success: function(data){
              opacarVentana();
            },
            error: function(e,r){
              alert("error");                                                                           
            }
          });
        });

      }//cierre if.
      else{
        desHabilitarBoton();
      }
    });

      $("#fechaNac").blur(function(){
        fechaNac = $("#fechaNac").val();
        if (fechaNac!="") {
          habilitarBoton();
        $("#actualizarFechaNac").click(function(){
         
         
          var data = new Object();
          data.keyword = $(this).data('id');
          $.ajax({
            url: '../../validar/updateDatosPerfil/updateFechaNac.php?fechaNac='+fechaNac,
            method: "POST",
            data: data,
            dataType: "html",
            success: function(data){
              opacarVentana();
            },
            error: function(e,r){
              alert("error");                                                                           
            }
          });
          });
        }
        else{
          desHabilitarBoton();  
        }
      });

   function habilitarBoton(){
    $(".btnGuardarVentanaModal").attr('disabled',false);
    $(".btnGuardarVentanaModal").css("background","#3B7DD8");
    $(".btnGuardarVentanaModal").css("cursor","pointer");
   }
   function desHabilitarBoton(){
    $(".btnGuardarVentanaModal").attr('disabled',true);
    $(".btnGuardarVentanaModal").css("background","gray");
    $(".btnGuardarVentanaModal").css("cursor","not-allowed");
   }
    function opacarVentana(){
      $(".ventanaModal").css("opacity","0.9");
        $('.cargador').show();
        setTimeout(function(){
           window.location.reload(); 
        },400);
    }
  });
//funciones para foto de perfil...al cerrar y abrir imagen mas grande
$(".fotoUsuario").click(function(){
    mostrarVentanaOscura();
});
$("#imgZoom").click(function(){

    $("#fotoUsuarioZoom img").addClass('ampliarFotoPerfil');
    mostrarVentanaOscura();
});
$(".imgCerrarFoto").click(function(){
    ocultarVentanaOscura();
});
$(document).keyup(function(tecla){
    if (tecla.keyCode == 27) {
       ocultarVentanaOscura();
       ocultarVentanaGaleria();
       $(".ventanaModal").hide();
       $(".cambiarPortada").hide('slow');
       $(".sectionPerfil").css('top','8em');
    }
});
function mostrarVentanaOscura(){
  $(".divFotoZoom").fadeIn('fast');
  $("#blackScreen").show();
}
function mostrarVentanaGaleria(){
  $("#blackScreen").show();  
  $("#divFotoZoomGaleria").fadeIn('fast');
}
function ocultarVentanaOscura(){
  $(".divFotoZoom").fadeOut('fast');
  $("#blackScreen").hide();
}
function ocultarVentanaGaleria(){
  $("#divFotoZoomGaleria").fadeOut('fast');
  $("#blackScreen").hide();
}
$(".imgsGaleria").click(function(){
    var rutaFoto = $(this).attr('src');
    $("#idImgGaleria").attr('src',rutaFoto);
    mostrarVentanaGaleria();
});
$(".imgCerrarFoto").click(function(){
    ocultarVentanaGaleria();
});
//cerrar ventana modal
$("#idSpanNombre,#imgEditNombreUsuario").click(function(){
$("#editNombreCompleto").show();
});

//ventana modal Genero
$("#idSpanGenero,#imgEditGenero").click(function(){
$("#editGenero").show();
});
//ventana modal Edad,FechaNacimiento
$("#idSpanFechaNac,#imgEditFechaNac").click(function(){
$("#ModalEditFechaNac").show();
});
//close
$(".imgCloseModal").click(function(){
    $(".ventanaModal").hide();
    $(".cambiarPortada").hide();
    $(".sectionPerfil").css('top','8em');
    $("#blackScreen").hide();
});

//function upload file
$("#fotoPerfil").on('change',function(){
      id = $(this).data('id');
  var formData = new FormData($("#formUploadFotoPerfil")[0]);

  if ($("#fotoPerfil").val()!='') {
    $.ajax({
    url: "../../validar/updateDatosPerfil/updateFoto.php?id="+id,
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      $('.alertFotoPerfilGrande').html(data);
      $(".fotoPerfilTemporal").attr('src','../../img/profile/'+data+'');
    },
    error: function(e,r){
              alert("error");                                                                           
        }
  });
  }
});
//function upload file para la foto de portada
$("#fotoFondo").on('change',function(){
   id = $(this).data('id');   
  var formData = new FormData($("#formUploadFotoPortada")[0]);

  if ($("#fotoFondo").val()!='') {

    $.ajax({
    url: "../../validar/updateDatosPerfil/updateImagenFondoEquipo.php?id="+id,
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function(data){
      $('#imagenDinamicaPortada').attr('src','../../img/portada/'+data+'');

    },
    error: function(e,r){
              alert("error");                                                                           
        }
  });
  }
});
$("#btnSubirFotos").click(function(){
  id = $(this).data('id');
  var fotos = document.getElementById('inputMultiplesFotos');
  var foto = fotos.files;
  var formData = new FormData();  

  for (i=0; i<foto.length; i++) {
    formData.append('archivo'+i,foto[i]);
  };
    $.ajax({
    url: "../../validar/uploadMultpleFiles.php?id="+id,
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    cache: false,
    success: function(data){
     $('.cargador').show();
        setTimeout(function(){
           location.reload(); 
        },1000);
    },
    error: function(e,r){
              alert("error");                                                                           
        }
  });
});

  $(".eliminarImagenByIdGaleria").click(function(){

    var id = $(this).data('id');
    var idusuario = $(this).data('idusuario');

    //id del contenedor padre.
    var parent = $(this).parent().attr('id');
  $.ajax({
      url: '../../validar/deleteImagenGaleriaById.php?id='+id+'&idUsuario='+idusuario,
      type: "POST",
      success: function(data){
        $('#'+parent).css({
          transition: '0.4s ease-out',
          padding: '0',
          margin: '0',
          width: '0',
          height: '0',
          opacity: '0'
        });
      },
      error: function(e,r){
        alert("error");
      }
    });
  });
  //buscar usuario instantaneamente gracias a ajax.

/*     $("#inputBuscarUsuario").focus();*/
    $("#inputBuscarUsuario").keyup(function(){
       var keyword = $(this).val();

    $.ajax({
      url: '../../validar/buscarPersonas.php?keyword='+keyword,
      method: "POST",
      dataType: "html",
      success: function(data){
        $(".usuariosBaseDatos").html(data);
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  });

    //buscar AMIGOS instantaneamente gracias a ajax.

/*     $("#inputBuscarUsuario").focus();*/
    $("#inputBuscarAmigo").keyup(function(){
       var keyword = $(this).val();

    $.ajax({
      url: '../../validar/buscarAmigo.php?keyword='+keyword,
      method: "POST",
      dataType: "html",
      success: function(data){
        $("#amigosConectados").html(data);
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  });
    //funcion para redireccionar a la pagina de el perfil de la persona que desea.
     $(".usuario").click(function(){
       var id = $(this).data('id');
       window.location.href= "../../private/client/index.php?opt=profileBD&id="+id;

      });

//FUNCION AL DAR CLIC EN EL BOTON AGREGAR ENVIARA UNA SOLICITUD DE AMISTAD.
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
        $('#btnStatusRequestFriend'+id).attr('src','../../img/icon/waiting.png');
         $('#btnStatusRequestFriend'+id).unbind();
      },
      error: function(e,r){
        alert("error");                                                                           
      }
    });

  });
  $('.imgNotifSolicitudAmistad').click(function(){
   $('.usuarioSolicAmistad').slideToggle('200');
  });
$('.emoticon').click(function(){
  alert("manito");
});
$('.imgCloseVentanaChat').click(function(){
  $('.ventanaChat').slideToggle();
});
//funcion para responsive web design menu.
$('.responsiveMenu').click(function(){
  $('#containerHeaderFooter').toggle('slide');
});