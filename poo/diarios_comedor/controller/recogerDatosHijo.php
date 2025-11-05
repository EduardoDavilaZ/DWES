<?php
	require_once '../model/Hijo.php';
	
	function validarNombre($nombre){
		if (!empty($nombre)){
			return $nombre;
		} else{
			echo "<h3>El nombre está vacío<h3>";
			error();
		}
	}
	
	function validarIdPadre($idPadre){
		if (!empty($idPadre)){
			return $idPadre;
		} else{
			echo "<h3>El idPadre está vacío<h3>";
			error();
		}
	}
	
	function error(){
		echo '<br><a href="../views/formHijo.php">Volver</a>'; //Volver al formulario
		die();
	}
	
	$hijo = new Hijo();
	
	$nombre = validarNombre($_POST["nombre"]);
	$idPadre = validarNombre($_POST["padre"]);
	
	$hijo->crear($nombre, $idPadre);
?>