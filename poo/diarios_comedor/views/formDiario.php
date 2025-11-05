<?php
	require_once '../model/Hijo.php';
	require_once '../model/Diario.php';
	require_once '../model/Padre.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/recogerDatosDiario.php" method="POST">
		<label for="hijo">Hijo: </label>
		<select name="hijo" id="hijo">
			
			<?php
				$hijo = new Hijo();
				$resultado = $hijo->listarHijos();
				
				echo '<option value="" disable>Selecciona un añumno</option>';
				while($fila = $resultado->fetch_assoc()){
					echo '<option value="' . $fila["idHijo"] . '">' . $fila["nombre"] . '</option>';
				}
			?>
			
		</select>
		
		<label for="fecha">Fecha: </label>
		<input type="date" name="fecha" id="fecha"/>
		
		<label for="tupper">Tupper</label>
		<input type="radio" value="1" name="tupper" />Si
		<input type="radio" value="0" name="tupper" />No
		
		<input type="submit" value="Enviar"/>
	</form>
</body>
</html>