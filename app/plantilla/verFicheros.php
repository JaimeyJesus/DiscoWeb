<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
<?=(isset($msg))?'<p>'.$msg.'</p>':''?>

<div class="grid-container">
<div class="grid-item"><b>Nombre</b></div>
<div class="grid-item"><b>Tipo</b></div>
<div class="grid-item"><b>Fecha</b></div>
<div class="grid-item"><b>Operaciones</b></div>
<div class="grid-item"></div>
<div class="grid-item"></div>
<?php
$auto = $_SERVER['PHP_SELF'];
// identificador => Nombre, email, plan y Estado
?>
<?php 
$directorio="../dat/".$userId;
if(is_dir($directorio)){
    $gestor=opendir($directorio);
    while(($archivo=readdir($gestor))!==false){
        ?>
        <div class="grid-item"><?= $archivo ?></div>
        <div class="grid-item"><?=filetype($archivo) ?></div>
        <div class="grid-item"><?=filemtime($archivo) ?></div>
        <div class="grid-item"><?=filesize($archivo) ?></div>
        <div class="grid-item"><a href="#"onclick="confirmarBorrar('<?= $archivo?>);">Borrar</a></div>
        <div class="grid-item"><a href="<?= $auto?>?orden=Modificar&id=<?= $clave ?>">Renombrar</a></div>
        <div class="grid-item"><a href="<?= $auto?>?orden=Detalles&id=<?= $clave?>">Copartir</a></div>
        </div>
<?php
    }
}
else{
    echo"El directorio no existe";
}
?>
		


<form action='index.php'>
	<input type='submit' name='orden' value='Modificar sus datos'> 
	<input type='submit' name='orden' value='Cerrar Sesión'>
</form>

<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>