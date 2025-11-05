<?php
	require_once '../bd/Conectar.php';

	class Padre extends Conectar{
		private $nombre;
		
		public function __construct(){
			parent::__construct();
		}
	
		public function crear($nombre){
			$sql = "INSERT INTO padres(nombre) VALUES ('". $nombre ."');";
			echo $sql;
			
			$this->conexion->query($sql);
			
			if($this->conexion->affected_rows > 0){
				echo "Padre insertado correctamente";
			} else{
				echo "ERror al insertar padre";
			}
		}
		
		public function leer($idPadre){
			$sql = "SELECT nombre FROM padres WHERE idPadre = " . $idPadre . ";";
			echo $sql;
			
			$resultado = $this->conexion->query($sql);
			
			if($resultado->num_rows > 0){
				echo "Consulta correcta todo biem";
			} else {
				echo "Error";
			}
			
			$fila = $resultado->fetch_assoc();
			return $fila["nombre"];
		}
		
		public function modificar($idPadre, $nombre){
			$sql = "UPDATE padres SET nombre = '". $nombre ."' WHERE idPadre = ". $idPadre .";";
			echo $sql;
			
			// Prueba: Modificar un registro con un id inexistente, no da error, pero tampoco
			// devueve las filas afectadas.
			
			try{
				$this->conexion->query($sql);
			} catch( mysqli_sql_exception $e){
				echo "<br>";
				echo "Mensaje de error: " . $e->getMessage();
				echo "<br>";
				echo "Código de error: " . $this->conexion->errno;
			};
			
			
			if($this->conexion->affected_rows > 0){
				echo "Registro actualizado";
			} else {
				echo "Error";
			}

		}
		
		public function eliminar($idPadre){
			$sql = "DELETE FROM padres WHERE idPadre = ". $idPadre .";";
			echo $sql;
			
			$this->conexion->query($sql);
			
			if($this->conexion->affected_rows > 0){
				echo "Registro actualizado";
			} else {
				echo "Error";
			}
		}
		
		public function listarPadres(){
			$sql = "SELECT * FROM padres;";
			
			$resultado = $this->conexion->query($sql);
			
			
			if ($resultado->num_rows > 0 && $resultado){
				echo "Consulta exitosa";
				return $resultado;
			} else{
				echo "No hay padres que mostrar";
			}	
		}
		
		public function eliminarPadres($padres){
			$sql = 'DELETE FROM padres WHERE idPadre IN (' . $padres . ')';
			echo $sql;
			
			try{
				$resultado = $this->conexion->query($sql);
			} catch(mysqli_sql_exception $e){
				if ($e->getCode() == 1451){ // Error de FOREIGN KEY
					echo "<br>Error: El padre tiene un hijo dado de alta";
				}
			}
			
			if ($this->conexion->affected_rows > 0){
				echo "<br>Consulta exitosa, se eliminaron los padres";
				return true;
			} else{
				return false;
			}
		}
	}	
	
?>