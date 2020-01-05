<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
<?=(isset($msg))?'<p>'.$msg.'</p>':''?>

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
        <div class="grid-item"><?=substr($archivo,-3) ?></div>
        <div class="grid-item"><?=date("d/m/Y",filemtime($directorio."/".$archivo)) ?></div>
        <div class="grid-item"><?=round((filesize($directorio."/".$archivo)/1024),2)."Kb" ?></div>
        <div class="grid-item"><a href="#" onclick="BorrarFichero('<?= $directorio."/".$archivo."','".$userId."'"?>);">
        	<img class="icono" alt="borrar" src="web/img/papelera.png"></a></div>
        <div class="grid-item"><a href="#" onclick="RenombrarFichero('<?= $directorio."/".$archivo."','".$userId."'"?>);">
        	<img class="icono" alt="modificar" src="web/img/editar.png"></a></div>
        <div class="grid-item"><a href="#" onclick="Descargar('<?=$directorio."','".$archivo."'"?>)">
        	<img class="icono" alt="modificar" src="web/img/compartir.png"></a></div>
               
<?php
    }
}
else{
    echo "<h1>Aun no tienes archivos en la nube</h1><h3>Puedes subir alguno con el botón \"Subir fichero\"</h3>";
}

?>
</div>

<form id="botones" action="index.php?id=<?$userId?>">
<div class="form-group mx-sm-4">
<div class="col-md-3">		
	<b>Numero de ficheros: <?=$numeroArchivos?></b><br/>
	<b>Espacio ocupado: <?=$espacioTotal." Kb" ?></b>
</div>
	 <input type='submit' class="col-md-3" name='orden' value='Subir Fichero'> 
	 <input type='submit' class="col-md-3" name='orden' value='Modificar sus datos'> 
	 <input type='submit' class="col-md-3" name='orden' value='Cerrar Sesión'>
</div>
</form>


<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>