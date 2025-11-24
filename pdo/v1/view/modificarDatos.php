<?php 
    var_dump($_GET);

    // Saber si se han enviado los datos idProfesor y el tipo de proceso
    if (isset($_GET["idProfesor"]) && isset($_GET["proceso"])){
        $idProfesor = $_GET["idProfesor"];
        $proceso = $_GET["proceso"];
    }

    // Saber si el campo nombre no ha dado error si está vacío
    if (isset($_GET["estado"])){
        if ($_GET["estado"] == "error"){
            echo "<br>Error: Campo de <b> nuevo nombre </b> está vacío.<br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/procesos.php?idProfesor=<?php echo $idProfesor; ?>&proceso=<?php echo $proceso; ?>" method="post">
        <label for="">Introduce el nuevo nombre: </label>
        <input type="text" name="nuevoNombre" placeholder="Nuevo nombre"/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>