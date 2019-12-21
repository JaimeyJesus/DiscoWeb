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
$directorio="app/dat/".$userId;
if(is_dir($directorio)){
    $gestor=opendir($directorio);
    while(($archivo=readdir($gestor))!==false){
        if( $archivo=="." || $archivo==".."){
            continue;
        }
        
        ?>
        <div class="grid-item"><?= $archivo ?></div>
        <div class="grid-item"><?=substr($archivo,-3) ?></div>
        <div class="grid-item"><?=date("d/m/Y",filemtime($directorio."/".$archivo)) ?></div>
        <div class="grid-item"><?=round((filesize($directorio."/".$archivo)/1024),2)."Kb" ?></div>
        <div class="grid-item"><a href="#"onclick="confirmarBorrar('<?= $archivo?>);">Borrar</a></div>
        <div class="grid-item"><a href="<?= $auto?>?orden=Modificar&id=<?= $clave ?>">Renombrar</a></div>
        <div class="grid-item"><a href="<?= $auto?>?orden=Detalles&id=<?= $clave?>">Compartir</a></div>
        
        
<?php
    }
}
else{
    echo"El directorio no existe =>".$directorio;
}

?>
</div>		

<form id="botones">
<div class="form-group mx-sm-3">
	 <input type='submit' class="col-sm-4" name='orden' value='Subir fichero'> 
	 <input type='submit' class="col-sm-4" name='orden' value='Modificar sus datos'> 
	 <input type='submit' class="col-sm-4" name='orden' value='Cerrar Sesión'>
</div>
</form>


<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>