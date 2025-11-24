<?php 
    require_once '../model/Profesor.php';

    var_dump($_GET);
    $idProfesor = $_GET["idProfesor"];
    $objProfesor = new Profesor();

    if ($_GET["proceso"] == "modificar"){
        if (!empty($_POST["nuevoNombre"])){
            $nuevoNombre = $_POST["nuevoNombre"];
        } else {
            header("Location: ../view/modificarDatos.php?estado=error");
            exit;
        }
        
        if($objProfesor->modificar($idProfesor, $nuevoNombre)){
            header("Location: ../view/crudProfesores.php?proceso=modificar&estado=exitoso");
        } else {
            header("Location: ../view/crudProfesores.php?proceso=modificar&estado=error");
        }   
    }

    if ($_GET["proceso"] == "eliminar"){
        if ($objProfesor->eliminar($idProfesor)){
            header("Location: ../view/crudProfesores.php?proceso=eliminar&estado=exitoso");
        } else {
            header("Location: ../view/crudProfesores.php?proceso=eliminar&estado=error");
        }
        
    }

?>