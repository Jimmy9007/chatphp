<!--INICIO PAGINA WEB-PORTAFOLIO DE TRABAJO (17/11/2015).-->
<?php
session_start();
if (($_SESSION['id']=='')&& ($_SESSION['nombre']=='')) {
  header("location: ../../");
}

$id = $_SESSION['id'];
require_once '../../app/class/Conexion.php';
require_once '../../app/models/PersonaModel.php';
$perModel = new PersonaModel();
$data = $perModel->read_user_by_id($id);

$content = "";

$opt = isset($_REQUEST["opt"])?$_REQUEST["opt"]:"";
switch (@$opt) {
  case 'perfil':
    $content = "../../contents/perfil.php";
    break;
    case 'profileBD':
    $content = "../../contents/profileBD.php";
    break;
  case 'chat':
    $content = "../../contents/chat.php";
    break;
    case 'buscarPersonas':
    $content = "../../contents/buscarPersonas.php";
    break;
  default:
    case 'inicio':
    $content = "../../contents/index.php";
    break;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?php echo ucfirst($_SESSION['nombre'])." ".ucfirst($_SESSION['apellido'])?></title>
    <meta name="Description" content="portafolio donde muestro mis trabajos realizados como programador.">         
    <meta name="Keywords" content="diseño, ,web, portafolio, pagina web,esleyder">
    <meta name="Robots" content="All">
    <meta name="viewport"content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../libreria/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/perfil.css">
     <link rel="icon" type="image/png" href="../../img/icon/favicon.ico" />
</head>
<body>
  <!--PRELOADER PARA FORMULARIO EDITAR-->

<!--     <div id="preloader">
      <div id="status"></div>
  </div> -->
  <div id="contenedor">
    <div id="menuTopParaMovil">
    <img src="../../img/icon/logoColor.png" id="imgLogoPerfil">
    <img src="../../img/icon/responsive-menu.png" class="responsiveMenu">
  </div>
  <div id="containerHeaderFooter" class="item">
        <div id="headerMenu"> 
            <header>
            <?php foreach ($data as $readUser) {
            }
            ?>
               <div id="logo" onclick="window.location.href='?opt=perfil'">
                    
                    <div id="imgFotoDePerfilHeader"><img src="../../img/profile/<?php echo $readUser['foto']?>" id='fotoUsuarioPerfil' class='fotoPerfilTemporal'></div>
                    <span><?php echo ucfirst($readUser['nombre'])?>

                    <?php echo ucfirst($readUser['apellido']) ?></span>
                    <div id='comprobarSession'>
                      
                    </div>
                    <a href="../../validar/cerrar_sesion.php" id="btnLogout">Cerrar sesión</a>
               </div>

                <div id="navigation">
                 <section class='notificaciones'>
                      <span class='spanCantidadSolicitudesAmistad'></span>
                      <img src="../../img/icon/notifcfFriends.png" id='iconNotifSolAmistad' class="imgNotifSolicitudAmistad">
                       <img src="../../img/icon/message.png" class="imgNotifSolicitudAmistad">
                      <div class='usuarioSolicAmistad'>
                        <img src="../../img/icon/ajax-loader.gif">
                      </div>
               </section>
                   <nav>
                       <ul class="bloquemenu">
                        <img src="../../img/icon/profileMini.png">
                            <li><a href="?opt=perfil">Mi perfíl</a></li>
                       </ul>
                       <ul class="bloquemenu">
                            <img src="../../img/icon/chatMini.png">
                             <li><a href="?opt=chat">Chat con amigos</a></li>
                       </ul>
                       <ul class="bloquemenu">
                       <img src="../../img/icon/searchMini.png">
                       <li><a href="?opt=buscarPersonas">Buscar Personas</a></li>
                           
                       </ul>
                   </nav> 
               </div>
            </header>
        </div>  
 
    </div>


