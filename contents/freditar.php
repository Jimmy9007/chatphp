<script type="text/javascript" src="../../js/index.js"></script>
<script type="text/javascript" src="../../js/dialog.js"></script>
<!--PRELOADER PARA FORMULARIO EDITAR-->
<?php
	extract($_REQUEST);
  $id = $_REQUEST['keyword'];

      require_once '../app/class/Conexion.php';
    	require_once '../app/models/PersonaModel.php';
    	$per_model  = new PersonaModel();
       $data = $per_model->editById($id);

?>
        <?php
        foreach ($data as $readUser) {
          
        }
       ?>
  <form action="../../validar/updateUser.php" id="formEditar" enctype="multipart/form-data" method="POST">
        <h2 class="txtForm">Actualizár   un usuario</h2>
        <input type="hidden" name="id" id="idEditUser"value="<?php echo $readUser['id']; ?>">
       <input type="text" name="nombre" value="<?php echo $readUser['nombre']; ?>" placeholder="Nombre">
       <input type="text" name="apellido" value="<?php echo $readUser['apellido']; ?>"placeholder="Apellido">
       <input type="text" name="correo" value="<?php echo $readUser['correo']; ?>"placeholder="Correo">
       <input type="text" name="telefono" value="<?php echo $readUser['telefono']; ?>" placeholder="Telefono">
       <input type="text" name="username" value="<?php echo $readUser['username']; ?>" placeholder="Nombre de usuario">
       <input type="password" name="pass" value="<?php echo $readUser['pass']; ?>" placeholder="Clave">
       <textarea name="descripcion" class="textarea" id="textareaEdit" placeholder="Descripcion"><?php echo $readUser['descripcion'];?></textarea>
       <img src="../../img/profile/<?php echo $readUser['foto']?>" id="fotoPerfil">
      <div class="uploadFile" id="uploadFileEdit">
        <p id="txtUploadFile">Cambiar foto</p>
        <input type="file" name="foto" id="foto"><br>
       </div>
       <button id="btnModUser" data-idEdit="<?php echo $id ?>" value="<?php echo $id ?>">Guardar</button>
     </form>


 
 
