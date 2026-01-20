<?php 
    define("RUTA_VISTAS", "views/");
    define("RUTA_CONTROLADORES", "controllers/c");

    define("DEF_CONTROLLER","Minijuego");
    define("DEF_METHOD","listarMinijuegos");


    // URL para mostrar imágenes
    define('URL_IMG', 'https://02.daw.esvirgua.com/minijuegos/uploads/minijuegos/');

    // Ruta para guardar imágenes en el servidor
    define('RUTA_IMG',      __DIR__ . '/../../uploads/minijuegos/'); 


    // Ruta para guardar el fichero generado y usarlo para la descarga
    define('RUTA_E_CSV',    __DIR__ . '/../../uploads/ficheros/exportarCSV/'); 

    // Ruta para guardar los ficheros CSV con las filas que se han introducido en la bd
    define('RUTA_I_CSV',    __DIR__ . '/../../uploads/ficheros/importarCSV/');
?>