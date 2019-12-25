/**
 * Funciones auxiliares de javascripts 
 */

function confirmarBorrar(nombre,id){
  if (confirm("¿Quieres eliminar el usuario:  "+nombre+"?"))
  {
   document.location.href="?orden=Borrar&id="+id;
  }
}

function confirmarModificar(nombre,id){
	  if (confirm("¿Quieres modificar el usuario:  "+nombre+"?"))
	  {
	   document.location.href="?orden=Modificar&id="+id;
	  }
	}

function BorrarFichero(fichero, id){
	
	  if (confirm("¿Quieres eliminar el fichero:  "+fichero+"?"))
	  {
	   document.location.href="?orden=Borrar Fichero&fichero="+fichero+"&id="+id;
	  }
}

function Alta(){
	document.location.href="?orden=Alta";
}

function VerArchivos(){
	document.location.href="?orden=verFicheros";
}



