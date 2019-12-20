

<?php 

ob_start();
?>
<h1>Formulario de acceso</h1>
<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>
<div id="divFormularioAcceso">
<form name='ACCESO' method="POST" action="index.php">
	<label>Usuario</label>
	<input type="text" name="user" value="<?= $user ?>">

	<label>Contraseña</label>
	<input type="password" name="clave" value="<?= $clave ?>"></td>

	<button name="orden" value="Entrar">Entrar</button>
</form>
</div>
<?php 

$contenido = ob_get_clean();
include_once "principal.php";

?>
