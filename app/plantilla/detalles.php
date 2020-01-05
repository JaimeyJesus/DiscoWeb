<?php

ob_start();

?>


<?php  
$auto = $_SERVER['PHP_SELF'];
$usuarioM=$usuarios[$_GET['id']];
$numeroArchivos=0;
$espacioTotal=0;

?>
<div id="detalles">
<div class="container">
<h1>Detalles de <?=$_GET['id']?></h1>
  <ul class="list-group">
    <li class="list-group-item">Nombre <span class="badge"><b><?=$usuarioM[1]?></b></span></li>
    <li class="list-group-item">Correo electrónico <span class="badge"><b><?=$usuarioM[2]?></b></span></li>
    <li class="list-group-item">Plan <span class="badge"><b><?=$usuarioM[3]?></b></span></li>
    <li class="list-group-item">Número de ficheros 
    	<span class="badge">
      <?php
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
    	<b><?=$numeroArchivos?></b>
    	</span>
	</li>
    <li class="list-group-item">Espacio ocupado
    	<span class="badge">
    	<meter min="0" max="5000" low="4000" high="200" optimum="0" value="<?=$espacioTotal?>"></meter>
    	</span>	
    </li>
  </ul>
</div>

<form action="index.php" method="POST">
	<input type="submit" name="VerUsuarios" value="Volver">
</form>       
</div>
<?php 

$contenido = ob_get_clean();
include_once "principal.php";

?>
