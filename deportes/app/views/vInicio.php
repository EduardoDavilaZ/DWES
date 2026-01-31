<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Inicio'); 
?>
<body>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 p-4 my-auto">

            <div class="col d-flex p-4">
                <a href="index.php?c=Paginas&m=inicioSesion" class="bg-title flex-fill b-shadow">
                    <div class="text-center d-block p-4">
                        <h2 class="display-5">Inicio de sesión</h2>
                        <i class="bi bi-box-arrow-in-right fs-1"></i>
                    </div>
                </a>
            </div>
        
            <div class="col d-flex p-4">
                <a href="index.php?c=Inscripcion&m=inscripcion" class="bg-title flex-fill b-shadow">
                    <div class="text-center d-block p-4">
                        <h2 class="display-5">Inscripcion</h2>
                        <i class="bi bi-pencil-square fs-1"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</html>