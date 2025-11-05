<?php
	require_once 'configdb.php';

	class Conectar {
		protected $conexion;
		
		public function __construct(){
			
			/* activar la notificación */
			// $controlador = new mysqli_driver();
			// $controlador->report_mode = MYSQLI_REPORT_ALL;
			
			$this->conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BDD);
			
			if ($this->conexion->connect_errno) {
				die("Falló la conexión: " . $this->conexion->connect_error);
			}
			
			$this->conexion->set_charset('utf8');
		}
		
		public function __destruct(){
			if ($this->conexion){
				$this->conexion->close();
			}
		}
	}
?>