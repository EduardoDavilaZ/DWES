<?php 
    include_once 'configdb.php';

    class Conectar {
        
        protected $conexion;

        public function __construct(){
            try {
                // DSN = SGBD + host + nombre de BDD
                $dsn = "mysql:host=" . SERVIDOR . ";dbname=" . BDD . ";charset=utf8";

                $this->conexion = new PDO($dsn, USUARIO, PASSWORD);

                // Detectar errores
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }

        public function __destruct(){
            $this->conexion = null;
        }
    }
?>