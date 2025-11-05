<?php
	require_once '../bd/Conectar.php';
	
	class Hijo extends Conectar {
		
		private $idHijo;
		private $nombre;
		private $idPadre;
		
		public function __construct(){
			parent::__construct();
		}
		
		public function crear($nombre, $idPadre){
			$sql = "INSERT INTO hijos(nombre, idPadre) VALUES ('". $nombre ."', '". $idPadre ."')";
			
			try{
				$resultado = $this->conexion->query($sql);
			} catch(mysqli_sql_exception $e){
				echo "Error en la consulta";
				echo "Código de error: " . $e->getCode();
				switch($e->getCode()){
					case 1146: echo "<br> La tabla no existe"; break;
					case 1062: echo "<br> Entrada duplicada"; break;
					case 1136: echo "<br> La cantidad de campos en el insert no coincide con los campos del VALUES"; break;
					case 1054: echo "<br> La columna de la tabla no existe"; break;
				}
			}
			
			if ($this->conexion->affected_rows > 0){
				echo "Hijo insertado correctamente";
				$this->idHijo = $this->conexion->insert_id; // Mostrar el id del último elemento insertado del campo PRIMARY KEY AUTO_INCREMENT
				echo '<br>ID del hijo: ' . $this->idHijo;
			} else {
				echo "Error al insertar";
			}
		}
		
		public function listarHijos(){
			$sql = "SELECT * FROM hijos;";
			echo $sql;
			
			$resultado = $this->conexion->query($sql);
			
			var_dump($resultado);
			
			if ($resultado->num_rows > 0 && $resultado){
				echo "Consulta exitosa";
				return $resultado;
			} else{
				echo "No hay niños que mostrar";
			}	
		}
	}
?>