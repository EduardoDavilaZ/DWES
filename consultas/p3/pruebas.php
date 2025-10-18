<?php
    /**
     * Funciones donde se preparan y ejecutan las consultas de prueba
     */
    include 'consultas.php';
    
    /**
     * Prueba de añadir una fila a la tabla del desplegable (hoteles).
    */
    añadirFila($conexion);

    /**
     * Prueba de añadir varias filas a la tabla del desplegable (hoteles).
    */
    añadirVariasFilas($conexion);

    /**
     * Prueba de crear una tabla de ejemplo (tabla Usuarios).
    */
    crearTablaUsuarios($conexion);

    /**
     * Eliminar la base de datos desde el usuario root (si funciona)
    */
    //eliminarBaseDeDatos($conexion);
?>

