<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Inicio'); 
?>
<body class="bg-color-4">

    <div class="container row justify-content-center py-4 mx-auto">


        <form action="./index.php?c=Usuario&m=inicioSesion" method="post" class="p-4 mx-auto form-group bg-color-1 border col-12 col-md-6 col-lg-3 bg-color-3 color-1 b-shadow">        
            <legend class="display-5 text-center">Inicio de sesión</legend>

            <label for="correo" class="form-label fs-4">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control" placeholder="Introduce el correo">

            <label for="password" class="form-label fs-4">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Introduce la contraseña">

            <input type="submit" value="Enviar" class="form-control my-3">
        </form>


    </div>
</html>