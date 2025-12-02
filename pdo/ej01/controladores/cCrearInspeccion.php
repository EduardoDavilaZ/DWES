<?php 
    require_once 'cInspecciones.php';
    $objControlador = new CInspecciones();
    $datos = $objControlador->crearInspeccion();
    if (is_array($datos)) extract($datos);
    require_once '../vistas/'. $objControlador->vista .'.php';
?>