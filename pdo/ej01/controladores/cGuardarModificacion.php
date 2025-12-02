<?php 
    require_once 'cInspecciones.php';
    $objControlador = new CInspecciones();
    $objControlador->guardarModificacion();
    header("Location: c" . $objControlador->vista . ".php ");
?>