<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
?>
<div id='aviso'><b><?= (isset($msg))?$msg:"" ?></b></div>
<div class="container">
  <h2>Subir fichero</h2>
  <div id="divSubirFichero">
  <form name="f1" enctype="multipart/form-data" action="index.php?orden=Subir Fichero" method="post">
	<div class="row">
        <input type="hidden" name="MAX_FILE_SIZE" value="199999990" />
        <label for="archivo">Elija el archivo a subir</label>
    </div>
    <div class="row">
        <input name="archivo" type="file"/>
    </div>
    <div class="row">
        <input type="submit" value="Subir fichero" />
    </div>
  </form>
</div>

<?php 

$contenido = ob_get_clean();
include_once "principal.php";
?>