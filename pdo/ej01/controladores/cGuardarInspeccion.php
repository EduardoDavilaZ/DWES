<?php 
    require_once 'cInspecciones.php';
    $objControlador = new CInspecciones();
    
    if ($objControlador->guardarInspeccion()){
        header("Location: c" . $objControlador->vista . ".php ");
    } else {
        die("Error");
    }
?>