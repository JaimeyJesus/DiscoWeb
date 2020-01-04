<?php

ob_start();

?>
<?=(isset($msg))?'<p>'.$msg.'</p>':''?>

<div class="grid-cabecera">
    <div class="grid-item-cabecera"><b>ID</b></div>
    <div class="grid-item-cabecera"><b>NOMBRE</b></div>
    <div class="grid-item-cabecera"><b>CORREO</b></div>
    <div class="grid-item-cabecera"><b>PLAN</b></div>
    <div class="grid-item-cabecera"><b>ESTADO</b></div>
    <div class="grid-item-cabecera"><b>BORRAR</b></div>
    <div class="grid-item-cabecera"><b>MODIFICAR</b></div>
    <div class="grid-item-cabecera"><b>DETALLES</b></div>
</div>
    <?php
    $auto = $_SERVER['PHP_SELF'];    
    ?>
<div class="grid-container">
    <?php foreach ($usuarios as $clave => $datosusuario) : ?>    		
    	<div class="grid-item"><?= $clave ?></div>
	<?php for  ($j=1; $j < count($datosusuario); $j++) :?>
	<div class="grid-item"><?=$datosusuario[$j] ?></div>
    	<?php endfor;?>
    <div class="grid-item"><a href="#"
		onclick="confirmarBorrar('<?= $datosusuario[1]."','".$clave."'"?>);">
		<img class="icono" alt="borrar" src="web/img/papelera.png"></a>
	</div>
    <div class="grid-item"><a href="<?= $auto?>?orden=Modificar&id=<?= $clave ?>">
    	<img class="icono" alt="modificar" src="web/img/editar.png"></a>
	</div>
    <div class="grid-item"><a href="<?= $auto?>?orden=Detalles&id=<?= $clave?>">
    	<img class="icono" alt="detalles" src="web/img/ojo.png"></a>
	</div>


<?php endforeach; ?>
</div>
<div class="botones">
<form action='index.php'>
	<input type='submit' name='orden' value='Cerrar Sesión'> 
	<input type='submit' name='orden' value='Alta'> 
	<input type='submit' name='orden' value='Mis Archivos'> 
</form>
</div>
<?php

$contenido = ob_get_clean();
include_once "principal.php";

?>