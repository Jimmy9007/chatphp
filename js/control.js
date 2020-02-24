function soloNumeros(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);
    numeros="0123456789";
    especiales="8-37-38-46";
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
        }
    }
    if(numeros.indexOf(teclado)==-1&& !teclado_especial){
        return false;
    }
}
 $(document).ready(function (){
          $('#fechaNac').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
            if ($(this).val==='00') {
              alert("no pueed ser cero");
            }
          });
        });
$("#passLogin").focus(function(){
  $("#seePassword").show();
});
$("#seePassword").mousedown(function(){
      $("#passLogin").attr("type",'text');
  });
$("#seePassword").mouseup(function(){
      $("#passLogin").attr("type",'password');
  });
//funcion para ver contraseña introducida.
$("#pass").focus(function(){
  $("#seePasswordSaveUser").show();
});
$("#seePasswordSaveUser").mousedown(function(){
      $("#pass").attr("type",'text');
  });
$("#seePasswordSaveUser").mouseup(function(){
      $("#pass").attr("type",'password');
  });
function validarFormReg(){
    var retorno = true;
    /***********/
    /***********/
    var txt_pass = $("#pass");
    if(txt_pass.val()===""){
        retorno = false;
        txt_pass.addClass("error_input");
        $(".msgError").slideDown(400);
        $(".textError").text("Introduce tu clave");
    }else{
        txt_pass.removeClass("error_input");
    } 
    /***********/
    var username = $("#username");
    if(username.val()===""){
        retorno = false;
        username.addClass("error_input");
        $(".msgError").slideDown(400);
        $(".textError").text("Introduce un nombre de usuario");
        
    }else{
        username.removeClass("error_input");
        
    } 
     /***********/
    
    var txt_correo = $("#correo");
    if(txt_correo.val()===""){
        retorno = false;
        txt_correo.addClass("error_input");
        $(".msgError").slideDown(400);
        $(".textError").text("Introduce un correo válido");
    }else{
        txt_correo.removeClass("error_input");
    } 
    /***********/
    var gm = $("#idGeneroH");
    var gf = $("#idGeneroM");
    if(!gm.prop("checked") 
            && !gf.prop("checked")){
      $("#divGenero").addClass("error_input");
      $(".msgError").slideDown(400);
      $(".textError").text("Selecciona tu genero");
        retorno = false;
    }
    else{
      $("#divGenero").removeClass("error_input");
    }
    var fechaNac = $("#fechaNac");
    if(fechaNac.val()===""){
        retorno = false;
        fechaNac.addClass("error_input");
        $(".msgError").slideDown(400);
        $(".textError").text("Introduce tu edad");
    }else{
        fechaNac.removeClass("error_input");
    } 
    /***********/
    var txt_fecha_nacimiento = $("#apellido");
    if(txt_fecha_nacimiento.val()===""){
        retorno = false;
        txt_fecha_nacimiento.addClass("error_input");
        $(".msgError").slideDown(400);
        $(".textError").text("Introduce tu apellido");
    }else{
        txt_fecha_nacimiento.removeClass("error_input");
    } 
      /***********/  
    var txtident = $("#nombre");
    if (txtident.val()==='') {
    retorno = false;
        txtident.addClass("error_input");
        $(".msgError").slideDown(400);
        $(".textError").text("Introduce tu nombre");

    }else{
        txtident.removeClass("error_input");
    } 
    /***********/    
    if(!retorno){
           
    }
    return retorno;
}//cierra la funcion.
function divMsg(){
    $(".msgError").slideUp(400);
} 
function divMsgCorreo(){
    $("#verifCorreoDup").slideUp(400);
} 
function divMsgValidarLogin(){
    $("#divMsgValidarLogin").slideUp(400);
} 
    
$(window).load(function(){

  var username = $("#usernameLogin");
  var pass = $("#passLogin");
  if (username.val()==''&& pass.val()=='') {
    $("#btnLogin").attr("disabled", true);
     $("#btnLogin").css("background","#B6B3B3");
     $("#btnLogin").css("cursor","not-allowed");     

  }
  else{
   
    $("#btnLogin").attr("disabled", false);
    $("#btnLogin").css("background","white");
  }
  var username = $("#usernameLogin").keyup(function(){
  if (username.val()!='' && pass.val()!='') {
    $("#btnLogin").attr("disabled", false);
    $("#btnLogin").css("background","white");
    $("#btnLogin").css("cursor","pointer"); 
  }
  else{
    $("#btnLogin").attr("disabled", true);
    $("#btnLogin").css("background","#B6B3B3");
    $("#btnLogin").css("cursor","not-allowed");

  }
  });
    var pass = $("#passLogin").keyup(function(){
  if (pass.val()!='' && username.val()!='') {
    $("#btnLogin").attr("disabled", false);
    $("#btnLogin").css("background","white");
    $("#btnLogin").css("cursor","pointer"); 
  }
  else{
    $("#btnLogin").attr("disabled", true);
    $("#btnLogin").css("background","#B6B3B3");
    $("#btnLogin").css("cursor","not-allowed");     
  }
  });

});

    $("#btnLogin").click(function(){

   var username = $("#usernameLogin").val();
   var pass = $("#passLogin").val();
    $.ajax({
      url: 'validar/validar_usuario.php?username='+username+'&pass='+pass,
      method: "POST",
      dataType: "json",
      success: function(data){
        if (data.id === 0) {
          $("#divMsgValidarLogin").html(data.msg).slideDown(200);
        }
        else{
          $("#divMsgValidarLogin").html(data.redirect).slideUp(200);
          
          window.location.href = "private/client/index.php";

        }
      },
      error: function(e,r){
        alert("error login");                                                                           
      }
    });

  });
//verificar si existe el correo en la base de datos...expresiones regulares regex.
$("#correo").blur(function(){
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
      if (regex.test($('#correo').val().trim())) {
          //si esta bien que no aparezca nada, por eso solo comento esta parte
        }
        else{
          $("#correo").val("");
          $(".msgError").slideDown(400);
          $(".textError").text("¡Este correo no es válido!");
        }

      //validacion de correo. con expresion regular.
      var data = new Object();
      data.keyword = $("#correo").val();
      $.ajax({
      url: "validar/busqueda_correoDuplicado.php",
      method: "POST",
      data: data,
      dataType: "json",
      success: function(data){
        if (data.id === 0) {
          $("#verifCorreoDup").slideUp(400);
        }
        else{
          $("#correo").val(""); // si es igual se borra el campo.
           $("#verifCorreoDup").html(data.msg1).slideDown(400);
        }
        
      },
      error: function(e,r){  
        alert("error");
      }
    });
});

