<!--PRELOADER PARA FORMULARIO EDITAR-->
<?php
     //id de usuario logeado
    $id = $_SESSION['id'];
    extract($_REQUEST);
    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    require_once '../../app/models/PortadaModel.php';
    require_once '../../app/models/GaleriaModel.php';
    require_once '../../app/models/AmigosModel.php';
    //instanciar singleton.
    $per_model     = new PersonaModel();
    $portadaModel  = new PortadaModel();
    $galeria_model = new GaleriaModel();
    
     $dataGaleria = $galeria_model->readFotosGaleriaByIdUsuario($id);
     $cantGaleria = $galeria_model->readCantFotosGaleriaByIdUsuario($id);
     $dataPortada   = $portadaModel->readPortada();
     $data = $per_model->read_user_by_id($id);
    

    
     foreach ($cantGaleria as $cantidadFotosGaleria) {
      $cantidadFotosGaleria = $cantidadFotosGaleria['count(*)'];
     }
    //cantidad de amigos que tiene la persona logueada.
    foreach ($data as $readUser) {
      $portada = $readUser['portada'];
    }
    ?>

  <div id="blackScreen"></div>
  <div class="backgroundPerfil">
        <?php echo "<img src='../../img/portada/$portada' id='imagenDinamicaPortada'/>";?>
       <div class="btnCambiarPortada">
         <span>Cambiar Portada</span>
       </div>
  </div>
   <div id="divFotoZoomGaleria" class="ui-widget-content">
    <span class='closeEsc'>Esc</span>
    <img src='' id='idImgGaleria' class='imgsGaleria ampliarFotoPerfil'/>
    <div class="fotoPerfilAjax " id="fotoUsuarioZoom"></div>
    <img src="../../img/icon/duplicado.png" class="imgCerrarFoto">
  </div>

  <section class="cambiarPortada">
  <img src="../../img/icon/close.png" class="imgCloseModal" id="closeCambiarPortada">
    <span class="labelOtrosDatos">Elige un imagen de portada.</span>
    <div class="imgsPortadaDefault">
      <div class="portadasEnBaseDatos">
          <?php
            //imagenes en base de datos... tabla portada
            foreach ($dataPortada as $readPortada) {
              $imagenesDePortada = $readPortada['nombre'];
              $idImagenPortada = $readPortada['id'];
              echo "<img src='../../img/portada/$imagenesDePortada' class='imagenesDePortada' data-id='$id' data-nombre='$imagenesDePortada'/>";
            }
          ?>       
      </div>
        <div class="backgroundPerfil">
          <?php echo "<img src='../../img/portada/$portada'/>";?>
          <div class="uploadFile" id="nuevaFotoFondo">
             <p id="txtUploadFile">Busca en tu equipo</p>
            <form id="formUploadFotoPortada" enctype="multipart/form-data" method="POST">
              <input type="file" name="portada" id="fotoFondo" data-id="<?php echo $id; ?>"><br>
            </form>
         </div>
    </div>

  </section>
<section class="sectionPerfil">
     <div id="actualizarOtrosDatos">
<!--aqui va algo de online-->
     <form id="formUpdateDatos" onsubmit="return false;" method="POST">
       <label class="labelOtrosDatos">Nombre de usuario:</label>
       <input type="text" name="username" id="username" class="inputUpdateOtrosDatos" value="<?php echo ($readUser['username']) ?>">
       <label class="labelOtrosDatos">Clave (encriptada):</label>
       <input type="password" name="pass" id="pass" class="inputUpdateOtrosDatos" value="<?php echo ($readUser['pass']) ?>">
       <label class="labelOtrosDatos">Correo:</label>
       <input type="text" name="correo" id="correoUpdate" class="inputUpdateOtrosDatos" value="<?php echo ($readUser['correo']) ?>">
      <input type="submit" class="btnGuardarVentanaModal" id="btnActualizarOtrosDatos" data-id="<?php echo $id ?>" disabled="false" value="Guardar">
     </form>
      </div> 
    

    
     <img src="../../img/icon/settings.png" id="imgSettings" title="Mas configuraciones">
     
     <div class="divFotoZoom ui-widget-content">
     <span class='closeEsc'>Esc</span>
     <img src="../../img/profile/<?php echo $readUser['foto']?>" class="ampliarFotoPerfil fotoPerfilTemporal">
          <div class="fotoPerfilAjax " id="fotoUsuarioZoom"></div>
          <img src="../../img/icon/duplicado.png" class="imgCerrarFoto">         
    </div>
    
    <div id="FotoPerfil">
        <img src="../../img/profile/<?php echo $readUser['foto']?>" class="fotoUsuario fotoPerfilTemporal">
        <img src="../../img/icon/zoom.jpg" id="imgZoom">
        <div class="fotoPerfilAjax"></div>
        <div class="uploadFile" id="nuevaFotoPerfil">
          <form id="formUploadFotoPerfil" enctype="multipart/form-data" method="POST">
            <input type="file" name="foto" id="fotoPerfil" data-id="<?php echo $id ?>" accept="image/*"><br>
          </form>
       </div>
    </div>
    <div class="divEditText" id="divTextoUsuario">   
        <span class="spanTexto" id="idSpanNombre"><?php echo ucfirst($readUser['nombre'])." ".ucfirst($readUser['apellido'])?></span>
        <div class="imgEditText"  id="imgEditNombreUsuario">
            <img src="../../img/icon/editText.png">
        </div>
    </div> 
    <div class="ventanaModal" id="editNombreCompleto">  
          <div class="triangulo"></div>
          <form class="formVentanaModal" id="formEditNombre" onsubmit="return false;">
          <img class="cargador" src="../../img/icon/ajax-loader.gif"/>
          <img src="../../img/icon/close.png" class="imgCloseModal">
            <label class="labelVentanaModal">Nombre:</label><br>
            <input type="text" name="nombre" id="nombre" value="<?php echo ucfirst($readUser['nombre']) ?>">
            <input type="text" name="apellido" id="apellido" value="<?php echo ucfirst($readUser['apellido']) ?>">
            <button class="btnGuardarVentanaModal" id="actualizarNombre" data-id="<?php echo $id ?>">Guardar</button>
          </form>
    </div>

    <!--espacio para edit genero-->

    <div class="divEditText" id="divTextoGenero">   
        <span class="spanTexto" id="idSpanGenero"><?php echo ucfirst($readUser['genero'])?></span>
        <div class="imgEditText" id="imagenEditarGenero">
            <img src="../../img/icon/editText.png" id="imgEditGenero">
        </div>
    </div> 
    <div class="ventanaModal"id="editGenero">    
          <div class="triangulo" id="trianguloGenero"></div>
          <form class="formVentanaModal" id="formEditGenero" onsubmit="return false;">
          <img class="cargador" src="../../img/icon/ajax-loader.gif"/>
          <img src="../../img/icon/close.png" class="imgCloseModal">
            <label class="labelVentanaModal">Genero:</label><br>
            <select name="genero" id="genero">
              <option value="">Selecciona</option>
              <option value="hombre">Hombre</option>
              <option value="mujer">Mujer</option>
            </select>
            <input type="submit" class="btnGuardarVentanaModal" id="actualizarGenero" data-id="<?php echo $id ?>" disabled="true" value="Guardar">
          </form>
    </div>
    <!--espacio para edit edad--><br><br>

    <div class="divEditText" id="editFechaNac"> 

        <span class="spanTexto" id="idSpanFechaNac"><?php echo "Edad: ".$readUser['fechaNac']." años"?></span>
        <div class="imgEditText" id="imagenEditarGenero">
            <img src="../../img/icon/editText.png" id="imgEditFechaNac">
        </div>
    </div> 
    <div class="ventanaModal"id="ModalEditFechaNac">    
          <div class="triangulo" id="trianguloFechaNac"></div>
          <form class="formVentanaModal" id="formEditFechaNac" onsubmit="return false;">
          <img class="cargador" src="../../img/icon/ajax-loader.gif"/>
          <img src="../../img/icon/close.png" class="imgCloseModal">
            <label class="labelVentanaModal">Fecha de nacimiento:</label><br>
            <input type="text" name="fechaNac" id="fechaNac" value="<?php echo $readUser['fechaNac'] ?>">
            <input type="submit" class="btnGuardarVentanaModal" id="actualizarFechaNac" data-id="<?php echo $id ?>" value="Guardar">
          </form>
    </div>
    
</section>

<!--SECTION PARA GALERIA DE IMAGENES-->
<section class="sectionPerfil" id="sectionGaleria">
  <div id="divUploadMultitplesFotos">
    <div class="cantTotalPhotos">
      <img src="../../img/icon/photos.png">
      <span class='spanGaleriaDeImagenes'><?php echo $cantidadFotosGaleria." ".'Fotos'?></span>
    </div>
      <div class="capaSubirFotos">
      <div class="uploadFile" id="uploadFileGaleria">
        <p id="txtUploadFile">Busca en tu equipo</p>
        <input type="file" multiple="multiple" id="inputMultiplesFotos" accept="image/*"><br>
      </div>
       <button id="btnSubirFotos" data-id="<?php echo $id ?>" >Subir Fotos</button>
       <img class="cargador" src="../../img/icon/update.GIF" id="actualizarFotos" />
    </div>
  </div>
  <div class="galeriaDeImagenes">
 
    <?php 
      foreach ($dataGaleria as $readImgsGaleria) {
        $idImgGaleria = $readImgsGaleria['id'];
        $idUsuario = $readImgsGaleria['idUsuario'];
        $imgsGaleria = $readImgsGaleria['nombre'];
        echo  "<div class='fotosGaleriaBaseDatos' id='usuario$idImgGaleria' data-idimagen='$idImgGaleria' >";
        echo "<img src='../../img/icon/delete.png' class='eliminarImagenByIdGaleria' data-id='$idImgGaleria' data-idusuario='$idUsuario' title='Eliminar'/>";
        echo "<img src='../../img/icon/profilePhoto.png' class='imgSelectProfilePhoto' data-nombre='$imgsGaleria' data-idusuario='$idUsuario' data-idfoto='$' title='foto de perfil'/>";
        echo "<img src='../../img/icon/photos.png' class='selectImPortada' data-nombre='$imgsGaleria' data-idusuario='$idUsuario' data-idfoto='$' title='foto de portada'/>";
        echo "<img src='../../img/galeria/$imgsGaleria' data-id='$idImgGaleria' class='imgsGaleria'/>";
        echo "<div id='cargaAjax'></div>";
        echo "</div>";
      }
    ?>
  </div>
     
</section>
<section class="sectionPerfil" id="sectionGaleria">

  <div class="cantTotalAmigos">
    <img src="../../img/icon/cantUsers.png">
   <span class='spanCantidadAmigos'></span>
  </div>
  <div class="usuariosBaseDatos" id="amigosByidLogueado">
    <img src="../../img/icon/ajax-loader.gif">
  </div>  
</section>

