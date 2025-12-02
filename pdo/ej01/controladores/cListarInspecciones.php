<?php 
    require_once 'cInspecciones.php';
    $objControlador = new CInspecciones();
    $inspecciones = $objControlador->listarInspecciones();
    require_once '../vistas/'. $objControlador->vista .'.php';
?>