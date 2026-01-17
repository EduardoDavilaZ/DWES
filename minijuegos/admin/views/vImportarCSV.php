<!DOCTYPE html>
<html lang="en">
    <?php 
        require_once 'views/partials/head.php';
        encabezado("Minijuegos");
    ?>

    <body>
        <?php 
            require_once 'views/partials/header.php';
        ?>

        <?php
            if (isset($mensaje)){
                echo '<div class="toast-error">' . $mensaje . '</div>';
            }
        ?>
        
        <main class="container">
            <form action="index.php?c=Minijuego&m=importarCSV" class="w-50 mx-auto" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend class="ms-4 m-2">Importar CSV</legend>

                    <label for="csv" class="form-label mt-3">Selecciona el fichero: </label>
                        <input type="file" name="csv" id="csv" class="form-control" accept=".csv, text/csv">

                    <input type="submit" class="btn my-4 form-control color1" value="Enviar">
                </fieldset>
            </form>
        </main>

    </body>
</html>