<?php
	var_dump($_POST);
	
	function validarHijo($hijo){
		if (!empty($hijo)){
			return $hijo;
		} else {
			echo "<br>El nombre está vacíoo.";
			error();
		}
	}
	
	function validarFecha($fecha){
		if (!empty($fecha)){
			return $fecha;
		} else {
			echo "<br>La fecha está vacía";
			error();
		}
	}
	
	function validarTupper(){
		if (isset($_POST["tupper"])){
			return $_POST["tupper"];
		} else{
			echo "<br>No has introducido ningún tupper";
			error();
		}
	}
	
	function error(){
		echo '<br><a href="../views/formDiario.php">Volver</a>'; //Volver al formulario
		die(); // MOrir
	}
	
	$idHijo = validarHijo($_POST["hijo"]);
	$fecha = validarFecha($_POST["fecha"]);
	$tupper = validarTupper();
	
	$diario = new Diario();
	$diario->guardarDiarioSelect($idHijo, $fecha, $tupper);
	
	echo $hijo;
?>