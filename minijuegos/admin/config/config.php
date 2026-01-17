<?php 
    define("RUTA_VISTAS", "views/");
    define("RUTA_CONTROLADORES", "controllers/c");

    define("DEF_CONTROLLER","Minijuego");
    define("DEF_METHOD","listarMinijuegos");


    // Ruta para guardar las imágenes de los juegos
    define('RUTA_IMG', '../uploads/minijuegos/');

    // Ruta para guardar el fichero generado y usarlo para la descarga
    define('RUTA_E_CSV', '../uploads/ficheros/exportarCSV/');

    // Ruta para guardar los ficheros CSV con las filas que se han introducido en la bd
    define('RUTA_I_CSV', '../uploads/ficheros/importarCSV/');
?>