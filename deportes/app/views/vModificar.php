<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Modificar'); 
?>
<body>
    <?php 
        require_once 'partials/header.php';
    ?>

    <main class="container">
        <form action="index.php?c=Deporte&m=modificar&id=<?php echo $deporte['idDeporte']; ?>" method="POST" class="w-50 mx-auto" enctype="multipart/form-data">

            <fieldset>
                <legend class="ms-4 my-3">Modificar deporte</legend>

                <label for="nombreDep" class="form-label mt-3">Nombre del deporte:</label>
                <input type="text" name="nombreDep"id="nombreDep" class="form-control" value="<?php echo $deporte['nombreDep']; ?>">


                <label for="imagen" class="form-label mt-3">Imágen: </label>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                    <button type="button" class="btn mt-2 color-3 border" onclick="limpiarImagen()">Quitar imagen</button>
                <input type="submit" class="my-4 form-control bg-color-3 color-1" value="Guardar cambios">
            </fieldset>

        </form>
    </main>

    <a href="index.php?c=Deporte&m=deportes" class="btn-volver py-2 px-4 fs-6">
        <i class="bi bi-arrow-counterclockwise"></i> Volver
    </a>
    <?php 
        if (isset($mensaje)){
            echo $mensaje;
        }
    ?>

    <script>
        let limpiarImagen = () => {
            document.getElementById('imagen').value = '';
        }
    </script>
</body>
</html>