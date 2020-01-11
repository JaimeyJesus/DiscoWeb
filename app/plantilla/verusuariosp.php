<?php

ob_start();

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?orden=Mis Archivos">Mis Archivos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?orden=Alta">Nuevo usuario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?orden=Cerrar Sesión">Cerrar sesión</a>
      </li>

    </ul>
  </div>
</nav>
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
		<img class="icono" id="icono" alt="borrar" src="web/img/papelera.png"></a><div id="accionIcono"><p>Borrar</p></div>
	</div>
    <div class="grid-item"><a href="<?= $auto?>?orden=Modificar&id=<?= $clave ?>">
    	<img class="icono" id="icono2" alt="modificar" src="web/img/editar.png"></a><div id="accionIcono2"><p>Modificar</p></div>
	</div>
    <div class="grid-item"><a href="<?= $auto?>?orden=Detalles&id=<?= $clave?>">
    	<img class="icono" id="icono3" alt="detalles" src="web/img/ojo.png"></a><div id="accionIcono3"><p>Ver detalles</p></div>
	</div>


<?php endforeach; ?>
</div>
<?php

$contenido = ob_get_clean();
include_once "principal.php";

?>