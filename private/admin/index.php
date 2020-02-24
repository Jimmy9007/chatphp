<?php
session_start();
if(@$_SESSION["username"]=="" and @$_SESSION["pass"]==""){
    header("location: ../../");
}
require_once '../../app/models/PersonaModel.php';
$perModel = PersonaModel::singleton();
$listaUser = $perModel->read_users();
$listadatosmenu = $perModel->read_users();
?>
<?php include '../../includes/headerAdmin.php' ?>

    <div id="containerPrincipal" class="item">
         <div id="contenedor2">

    <!--espacio para contenido dinamico................-->
    <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Usuario</a></li>
    <li><a href="#tabs-2">Proyectos</a></li>
    <li><a href="#tabs-3">Juegos</a></li>
        <!--espacio para LOGIN................-->
    <div id="login">
     <img src="../../img/profile/<?php echo $_SESSION["photo"] ?>" id="imgloginUser">
      <p><?php echo ucfirst($_SESSION["name"]) ?>
      <?php echo ucfirst($_SESSION["apellido"]) ?>
      </p>
      
      <a href="../../validar/cerrar_sesion.php">Salir</a>
    </div>
  </ul>
  <div id="tabs-1">
      <div id="accordion">
      <!---este espacio termina la parte de listar usuarios --><!---este espacio termina la parte de listar usuarios -->
      <!---este espacio termina la parte de listar usuarios --><!---este espacio termina la parte de listar usuarios -->
    <h3>Listar</h3>
    <div>
      <center>  
     
        <table class="tabla_formulario" id="tablaUsuarios" border="1">
          <thead>
          <tr class="cabecera">
            <td>#</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Correo</td>
            <td>Telefono</td>
            <td>Foto</td>
            <td>Opciones</td>
          </tr>
          </thead>
          
          <tr>
          <?php
          foreach ($listaUser as $registro) {
          
          ?>
            <td><?php echo $registro['id']?></td>
            <td><?php echo ucfirst($registro['nombre'])?></td>
            <td><?php echo ucfirst($registro['apellido'])?></td>
            <td><?php echo ucfirst($registro['correo'])?></td>
            <td><?php echo $registro['telefono']?></td>
            <td>
            <img 
              width="25px"
              height="25px"
              alt="<?php echo $registro['nombre'] ?>"
              src="../../img/profile/<?php echo $registro['foto'] ?>">
            </td>
            <td><a class="editar" data-id="<?php echo $registro['id']?>"><img src="../../img/icon/edit.png" class="optionTable" title="Editar"></a>
            <a class="eliminar" data-id="<?php echo $registro['id']?>"><img src="../../img/icon/delete.png" class="optionTable" title="Eliminar"></a></td>

          </tr>

          <?php } ?>
        </table> 
      </center>
     
<!---este espacio termina la parte de list>ar usuarios --><!---este espacio termina la parte de listar usuarios -->
<!---este espacio termina la parte de listar usuarios >--><!---este espacio termina la parte de listar usuarios -->
    </div>
    <h3>Ingresar</h3>
    <div>
     <form action="../../validar/registroUsuario.php"name="form" id="form" enctype="multipart/form-data" method="POST" onsubmit="return validarFormReg();">
        <h2 class="txtForm">Registrar un usuario</h2>
        <div class="msgError" onclick="divMsg();">
          <p class="textError"></p>
        </div>
       <input type="text" name="nombre" id="nombre" placeholder="Nombre">
       <input type="text" name="apellido" id="apellido" placeholder="Apellido">
       <input type="text" name="correo"id="correo"  placeholder="Correo">
       <input type="text" name="telefono" id="telefono" placeholder="Telefono">
       <input type="text" name="username" id="username" placeholder="Nombre de usuario">
       <input type="password" name="pass" id="pass" placeholder="contraseña">
       <textarea name="descripcion" class="textarea" id="descripcion" placeholder="Descripcion"></textarea>
       <!--div para estilos input file-->
       <div class="uploadFile">
         <p id="txtUploadFile">subir foto</p>
        <input type="file" name="foto" id="foto" placeholder="Foto"><br>
       </div>
       <input type="hidden" name="foto2" id="defaultPhoto" value="defaultPhoto.png">
       <!--div para estilos input file-->
       <button id="btnGuardarUsuario">Guardar</button>
     </form>
    </div>
    </div><!--cierra acordeon tab 1.-->
  </div>
  <div id="tabs-2">
    <p>Ingresar</p>

  </div>
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
</div>
      <!--espacio para contenido dinamico................-->
        </div>
      
  </div>
</div>
<div id="dialog2">
  <div id="contentDinamico">
      
  </div>
</div>
<div id="dialog3" title=" Eliminar">

</div>

<?php include '../../includes/footerAdmin.php' ?>

      


