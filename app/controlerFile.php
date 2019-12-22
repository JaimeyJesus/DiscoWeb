<?php
// --------------------------------------------------------------
// Controlador que realiza la gestión de ficheros de un usuario
// ---------------------------------------------------------------

function ctlFileVerFicheros(){
    $usuarios=modeloUserGetAll();
    $userId=$_SESSION['user'];
    $user=$usuarios[$userId];
    $msg="Archivos del usuario: <b>".$userId."</b>";
    include_once 'plantilla/verFicheros.php';
}

function ctlFileSubirFichero(){
    $msg="";
    $userId=$_SESSION['user'];
    if(!isset($_FILES['archivo'])){
        $usuarios=modeloUserGetAll();
        $user=$usuarios[$userId];
        include_once 'plantilla/subirFichero.php';
    }else{
        $archivo = $_FILES['archivo'];
        if(modeloFileUpFile($archivo,$userId,$msg)){
            include_once 'plantilla/verFicheros.php';
        }else {
            $msg .= "No se ha podido subir el archivo";
            include_once 'plantilla/subirFichero.php';
        }
        
        
    }
}

function ctlFileDescargarFichero(){
    
}

function ctlFileCambiarNombreFichero() {
    
}

function ctlFileBorrarFichero(){
    $msg ="";
    $fichero=$_GET['fichero'];

    if(modeloFileBorrar($fichero)){
        $msg="La operación se realizó correctamente.";
        include_once 'plantilla/verFicheros.php';
    }else{
        $msg="No se pudo relaizar la operación.";
    }
    
    
}