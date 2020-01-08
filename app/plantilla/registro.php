<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
<div id='aviso'>
	<b><?= (isset($msg))?$msg:"" ?></b>
</div>
<div id="divFormularioNuevo">
	<form action="index.php?orden=Nuevo" method="POST">

	<?php $auto = $_SERVER['PHP_SELF'];?>

		Identificador <input type="text" name="id" value="<?=(isset($_POST['id']))?$_POST['id']:""?>" >
		Nombre <input type="text" name="nombre" value="<?=(isset($_POST['nombre']))?$_POST['nombre']:""?>">
		Correo Electrónico <input type="text" name="mail" value="<?=(isset($_POST['mail']))?$_POST['mail']:""?>">
		Contraseña <input type="password" name="password" value="<?=(isset($_POST['password']))?$_POST['password']:""?>">
		Repita contraseña <input type="password" name="password2" value="<?=(isset($_POST['password2']))?$_POST['password2']:""?>">
		Plan <select name="plan">
			<option value="0">Básico</option>
			<option value="1">Profesional</option>
			<option value="2">Premium</option>
			<option value="3">Máster</option></select>

		<input id="registro" type="submit" name="orden" value="Registrarse">
		<input type="button" name="atras" onclick="Atras()" value="atras">
	</form>
</div>    
<?php 
// Vacio el bufer y lo copio a contenido
// Para que se mue p div de contenido de la página principal

$contenido = ob_get_clean();
include_once "principal.php";

?>
