<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?orden=Subir Fichero">Subir fichero<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?orden=Modificar sus datos">Modificar datos</a>
      </li><?php if($_SESSION['modo']==GESTIONUSUARIOS){?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?orden=VerUsuarios">Volver a administración</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?orden=Cerrar Sesión">Cerrar sesión</a>
      </li>
    </ul>
  </div>
</nav>
<?=(isset($msg))?'<p>'.$msg.'</p>':''?>
<div class="container">
<div class="grid-cabecera-ficheros">
    <div class="grid-item-cabecera"><b>Nombre</b></div>
    <div class="grid-item-cabecera"><b>Tipo</b></div>
    <div class="grid-item-cabecera"><b>Fecha</b></div>
    <div class="grid-item-cabecera"><b>Tamaño</b></div>
    <div class="grid-item-cabecera"><b>Operaciones</b></div>	
</div>
<?php
$auto = $_SERVER['PHP_SELF'];
// identificador => Nombre, email, plan y Estado
?>
<div class="grid-ficheros">
<?php 
$numeroArchivos=0;
$espacioTotal=0;

//compruebo si hay un id por get(llego a la pantalla desde el login o si por el contrario, llego despues de haber 
//borrado algún archivo, y rescato el el valor de id pasado por get en la función de borrar)
if(!isset($_GET['id'])){
$_GET['id']=$userId;
}else{
    $userId=$_GET['id'];
}

$directorio="app/dat/".$userId;
if(is_dir($directorio)){
    $gestor=opendir($directorio);
    while(($archivo=readdir($gestor))!==false){
        if( $archivo=="." || $archivo==".."){
            continue;
        }
        $numeroArchivos++;
        $espacioTotal +=round((filesize($directorio."/".$archivo)/1024),2);
        ?>
        <div class="grid-item"><?= $archivo ?></div>
        <div class="grid-item"><?=mime_content_type($directorio."/".$archivo) ?></div>
        <div class="grid-item"><?=date("d/m/Y",filemtime($directorio."/".$archivo)) ?></div>
        <div class="grid-item"><?=round((filesize($directorio."/".$archivo)/1024),2)."Kb" ?></div>
        <div class="grid-item"><a href="#" onclick="BorrarFichero('<?= $directorio."/".$archivo."','".$userId."'"?>);">
        	<img class="icono" alt="borrar" src="web/img/papelera.png"></a><div id="accionIcono"><p>Borrar</p></div></div>
        <div class="grid-item"><a href="#" onclick="RenombrarFichero('<?= $directorio."/".$archivo."','".$userId."'"?>);">
        	<img class="icono" id="icono2" alt="modificar" src="web/img/editar.png"></a><div id="accionIcono2"><p>Renombrar</p></div></div>
        <div class="grid-item"><a href="#" onclick="Descargar('<?=$directorio."','".$archivo."'"?>)">
        	<img class="icono" id="icono3" alt="modificar" src="web/img/compartir.png"></a><div id="accionIcono3"><p>Descargar</p></div></div>
               
<?php
    }
}
else{
    echo "<h1>Aun no tienes archivos en la nube</h1><h3>Puedes subir alguno con el botón \"Subir fichero\"</h3>";
}

?>
</div>

<form id="botones" action="index.php?id=<?$userId?>">
<div class="col-md-6">		
	<span>Numero de ficheros: <?=$numeroArchivos?></span>
	<span>Espacio ocupado: <?=$espacioTotal." Kb" ?></span>
</div>
</form>

</div>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>