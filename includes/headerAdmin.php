<!--INICIO PAGINA WEB-PORTAFOLIO DE TRABAJO (17/11/2015).-->
<?php
$id = "32";
require_once '../../app/models/PersonaModel.php';
$perModel = PersonaModel::singleton();
$data = $perModel->read_user_by_id($id);


$content = "";

$opt = isset($_REQUEST["opt"])?$_REQUEST["opt"]:"";
switch (@$opt) {
  case 'inicio':
    $content = "contents/index.php";
    break;
  case 'perfil':
    $content = "contents/perfil.php";
    break;
    case 'admin':
    $content = "private/admin/indexAdmin.php";
    break;
  default:
    case 'inicio':
    $content = "contents/index.php";
    break;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Mis proyectos</title>
    <meta name="Description" content="portafolio donde muestro mis trabajos realizados como programador.">         
    <meta name="Keywords" content="diseño, ,web, portafolio, pagina web,esleyder">
    <meta name="Robots" content="All">
    <meta name="viewport"content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="../../libreria/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="../../css/style.css">
     <link rel="stylesheet" href="../../css/admin.css"> 
     <link rel="stylesheet" href="../../css/dataTables.css"> 
</head>
<body>
  <!--PRELOADER PARA FORMULARIO EDITAR-->

    <div id="preloader">
      <div id="status"></div>
  </div>
  <div id="contenedor">
  <div id="containerHeaderFooter" class="item">
        <div id="headerMenu"> 
            <header>
            <?php foreach ($data as $readUser) {
              

            }
            ?>
               <div id="logo" title='Esleyder' onclick="window.location.reload(true)">
               <img src="../../img/profile/<?php echo $readUser['foto']?>">
                    <span><?php echo ucfirst($readUser['nombre'])?>
                    <?php echo ucfirst($readUser['apellido']) ?></span>
                    
                    
               </div>
                <div id="navigation">
                   <nav>
                       <ul class="bloquemenu">
                        <img src="../../img/icon/profileMini.png">
                            <li><a href="?opt=perfil">Perfil</a></li>
                       </ul>
                       <ul class="bloquemenu">
                            <img src="../../img/icon/portfolioMini.png">
                            <li><a href="">Proyectos</a></li>
                       </ul>
                       <ul class="bloquemenu">
                       <img src="../../img/icon/contactMini.png">
                            <li><a href="">Contacto</a></li>
                       </ul>
                   </nav> 
               </div>
            </header>
        </div>  
    </div>
