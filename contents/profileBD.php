<!--PRELOADER PARA FORMULARIO EDITAR-->
<?php
    if ($_REQUEST['id'] == $_SESSION['id']) {
      header("location: ../../private/client/index.php?opt=perfil");
    }
    extract($_REQUEST);
    //id de usuario logeado
    require_once '../../app/class/Conexion.php';
    require_once '../../app/models/PersonaModel.php';
    require_once '../../app/models/PortadaModel.php';
    require_once '../../app/models/GaleriaModel.php';
    require_once '../../app/models/AmigosModel.php';


    //instanciar singleton.
    $amigos_model  = new AmigosModel();
    $per_model     = new PersonaModel();
    $portadaModel  = new PortadaModel();
    $galeria_model = new GaleriaModel();

    $dataGaleria = $galeria_model->readFotosGaleriaByIdUsuario($id);
    $cantGaleria = $galeria_model->readCantFotosGaleriaByIdUsuario($id);
    $dataPortada = $portadaModel->readPortada();
    $data        = $per_model->read_user_by_id($id);
    $cantAmigos  = $amigos_model->readCantFriendByIdLogueado($id);
    $dataAmigos  = $amigos_model->readFriendByIdLogueado($id);

     foreach ($cantGaleria as $cantidadFotosGaleria) {
      $cantidadFotosGaleria = $cantidadFotosGaleria['count(*)'];
     }
    foreach ($data as $readUser) {
      $portada = $readUser['portada'];
    }
    foreach ($cantAmigos as $cant) {
        $cant = $cant['count(*)'];
    }
    if ($readUser['online'] == 0) {
      $online = "<span id='idSpanEstadoOffline'>Desconectado</span>";
    }else{
      $online = "<span id='idSpanEstadoOnline'>En linea</span>";
    }
?>
  <div id="blackScreen"></div>
  <div class="backgroundPerfil">
        <?php echo "<img src='../../img/portada/$portada' id='imagenDinamicaPortada'/>";?>
  </div>
  <div id="divFotoZoomGaleria">
    <span class='closeEsc'>Esc</span>
    <img src='' id='idImgGaleria' class='imgsGaleria ampliarFotoPerfil'/>
    <div class="fotoPerfilAjax " id="fotoUsuarioZoom"></div>
    <img src="../../img/icon/duplicado.png" class="imgCerrarFoto">
  </div>
<section class="sectionPerfil">
     <div class="divFotoZoom">
     <span class='closeEsc'>Esc</span>
     <img src="../../img/profile/<?php echo $readUser['foto']?>" class="fotoBaseDatos ampliarFotoPerfil">
          <div class="fotoPerfilAjax " id="fotoUsuarioZoom"></div>
          <img src="../../img/icon/duplicado.png" class="imgCerrarFoto">         
    </div>
    <div id="FotoPerfil">
        <img src="../../img/profile/<?php echo $readUser['foto']?>" class="fotoUsuario fotoBaseDatos">
        <img src="../../img/icon/zoom.jpg" id="imgZoom">

    </div>
    <div class="divEditText" id="divTextoUsuario">   
      <span class="spanTexto quitarFormatoClic" id="idSpanNombre"><?php echo ucfirst($readUser['nombre'])." ".ucfirst($readUser['apellido'])?></span>
    </div> 
    <div class="divEditText" id="divTextoGenero">   
      <span class="spanTexto quitarFormatoClic" id="idSpanGenero"><?php echo ucfirst($readUser['genero'])?></span>
    </div> 
    <div class="divEditText" id="editFechaNac"> 
      <span class="spanTexto quitarFormatoClic" id="idSpanFechaNac"><?php echo "Edad: ".$readUser['fechaNac']." años"?></span>
    </div> 
    <div class="divEditText" id="editFechaNac"> 

      <span class="spanTexto quitarFormatoClic" id="idSpanEstadoUsuario"><?php echo "Estado:".$online?></span>
    </div> 
</section>
<!--SECTION PARA GALERIA DE IMAGENES-->
<section class="sectionPerfil" id="sectionGaleria">
  <div class="cantTotalAmigos"  id='idSpanResponsive'>
  <img src="../../img/icon/cantUsers.png">
   <span class='spanGaleriaDeImagenes'><?php echo $cantidadFotosGaleria." ".'Fotos'?></span>
  </div>
  <div class="galeriaDeImagenes">
 
    <?php 
      foreach ($dataGaleria as $readImgsGaleria) {
        $idImgGaleria = $readImgsGaleria['id'];
        $idUsuario = $readImgsGaleria['idUsuario'];
        $imgsGaleria = $readImgsGaleria['nombre'];
        echo  "<div class='fotosGaleriaBaseDatos' id='usuario$idImgGaleria' data-idimagen='$idImgGaleria' >";
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
   <span class='spanCantidadAmigosProfileDB'><?php echo $cant." Amigos" ?></span>
  </div>
  <?php
    foreach ($dataAmigos as $user) {
     $nombre = $user['nombre'];
     $apellido = $user['apellido'];
     $fechaN = $user['fechaNac'];
     $foto = $user['foto'];
     $idUserAmigo = $user['idUserLogin'];
     $idUser = $user['idUser'];
/*     $cantAmigos = $user['count(*)'];*/

    ?>
 <div class="amigoDeAmigo"  id='user<?php echo $idUserAmigo?>' data-idamigo='<?php echo $idUserAmigo ?>' data-id='<?php echo $idUser?>'>
    <span class="spanNombreApellido"><?php echo ucfirst($nombre)." ".ucfirst($apellido).", ".$fechaN?></span>
    <img src="../../img/profile/<?php echo $foto ?>" class='miniaturaFotoPerfil'/>
</div>
<?php }?>
</section>
<script src="../../libreria/jquery-ui/external/jquery/jquery.js"></script>
<script type="text/javascript">

  $('.amigoDeAmigo').click(function(){
      var id = $(this).data('id');
      window.location.href= "../../private/client/index.php?opt=profileBD&id="+id;
  });
</script>