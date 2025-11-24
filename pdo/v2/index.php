<?php
    require_once 'config/config.php';

    if(!isset($_GET['c'])) $_GET['c'] = DEF_CONTROLLER; // Controlador por defecto
    
    if(!isset($_GET['m'])) $_GET['m'] = DEF_METHOD; // Método por defecto

    $rutaControlador = RUTA_CONTROLADORES . $_GET['c'] . '.php';
    require_once $rutaControlador;

    $controlador = 'C' . $_GET['c'];
    $objControlador = new $controlador();

    $datos = []; // Por si el método devuelve algo

    if (method_exists($objControlador, $_GET['m'])){
        $datos = $objControlador->{    $_GET['m']  }();
    }

    if ($objControlador->vista != ''){
        if (is_array($datos)) extract($datos); // Convierte cada campo del array asociativo en una variable
        require_once RUTA_VISTAS .$objControlador->vista . '.php'; // Ruta de las vistas + nombre de la vista + .php
    }
?>