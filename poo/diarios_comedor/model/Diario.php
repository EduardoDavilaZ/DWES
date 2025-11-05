<?php

	class Diario extends Conectar{
		public function __constructor(){
			parent::__constructor();
		}
		
		public function guardarDiarioSelect($idHijo, $fecha, $tupper){
			$sql = "INSERT INTO diarios(idHijo, fecha, tupper) VALUES (" . $idHijo . ", '" . $fecha ."', ". $tupper .")";
			echo $sql;
			
			$resultado = $this->conexion->query($sql);
			if ($resultado && $resultado->num_rows() > 0){
				return $resultado;
			} else {
				echo "Error";
			}
		}
		
		public function guardarDiarioCB($idHijos, $fecha, $tupper){
			
		}
	}
	
?>