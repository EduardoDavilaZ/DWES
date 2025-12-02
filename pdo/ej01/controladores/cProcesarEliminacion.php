<?php 
    require_once 'cInspecciones.php';
    $objControlador = new CInspecciones();
    $idRevision = $_GET['idRevision'];
    $objControlador->eliminarInspeccion($idRevision);
    header("Location: c" . $objControlador->vista . ".php ");
?>