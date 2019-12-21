<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
?>

<h1>Subida de ficheros</h1>
<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>
<div id="divFormularioAcceso">
<form name="f1" enctype="multipart/form-data" action="index.php?orden=Subir fichero" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="199999990" />
<label>Elija el archivo a subir</label> <input name="archivo" type="file" /> <br />
<input type="submit" value="Subir fichero" />
</form>
</div>
<?php 

$contenido = ob_get_clean();
include_once "principal.php";
?>