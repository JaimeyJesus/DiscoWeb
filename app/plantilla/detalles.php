<?php

ob_start();

?>


<?php  
$auto = $_SERVER['PHP_SELF'];
$usuarioM=$usuarios[$_GET['id']];

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
    	<b>0 ficheros</b>
    	</span>
	</li>
    <li class="list-group-item">Espacio ocupado <span class="badge">
    	<meter min="0" max="100" low="85" high="15" optimum="0" value="45"></meter>
    </span></li>
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
