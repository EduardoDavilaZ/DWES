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
        <form action="index.php?c=Deporte&m=modificar&id=<?php echo $deporte['idDeporte']; ?>" method="POST" class="w-50 mx-auto">

            <fieldset>
                <legend class="ms-4 my-3">Modificar deporte</legend>

                <label for="nombreDep" class="form-label mt-3">Nombre del deporte:</label>
                <input type="text" name="nombreDep"id="nombreDep" class="form-control" value="<?php echo $deporte['nombreDep']; ?>" required>

                <input type="submit" class="btn my-4 form-control" value="Guardar cambios">
            </fieldset>

        </form>
    </main>
</body>
</html>