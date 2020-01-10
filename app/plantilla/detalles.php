<?php

ob_start();

?>


<?php  
$auto = $_SERVER['PHP_SELF'];
$usuarioM=$usuarios[$_GET['id']];
$numeroArchivos=0;
$espacioTotal=0;
$directorio="app/dat/".$_GET['id'];
if(is_dir($directorio)){
$gestor=opendir($directorio);
  while(($archivo=readdir($gestor))!==false){
  if( $archivo=="." || $archivo==".."){
      continue;
  }
  $numeroArchivos++;
  $espacioTotal +=round((filesize($directorio."/".$archivo)/1024),2);
}
}
?>

<div class="container">
<h2>Detalles de <?=$_GET['id']?></h2>
  <div class="row">
    <div class="col">Nombre</div>
    <div class="col"><?=$usuarioM[1]?></div>
  </div>
  <div class="row">
    <div class="col">Email</div>
    <div class="col"><?=$usuarioM[2]?></div>
  </div>
  <div class="row">
    <div class="col">Plan</div>
    <div class="col"><?=$usuarioM[3]?></div>
  </div>
  <div class="row">
    <div class="col">Número de ficheros</div>
    <div class="col"><?=$numeroArchivos?></div>
  </div>
  <div class="row">
    <div class="col">Espacio ocupado</div>
    <div class="col"><meter min="0" max="10000" low="5000" high="1000" optimum="0" value="<?=$espacioTotal?>"></meter></div>
  </div>
  <div class="row">
    <div class="col">
      <form action="index.php" method="POST" id="formularioDetalles">
	      <input type="submit" name="VerUsuarios" value="Volver">
      </form>  
    </div>
  </div>
</div>

     

<?php 
$contenido = ob_get_clean();
include_once "principal.php";
?>
