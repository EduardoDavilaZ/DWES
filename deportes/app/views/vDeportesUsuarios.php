<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Usuarios inscritos'); 
?>
<body>
    <?php 
        require_once 'partials/header.php';
    ?>

    <main class="container">
            <section class="my-4">
                <?php 
                    echo  '<p class="fs-4">Total de deportes que tienen alumnos inscritos: ' . $total . '</p>';
                ?>
            </section>

            <section class="my-4">
                <?php
                    if ($usuariosDeportes){
                        echo  '<table class="table mt-2">' . 
                                '<thead>' .
                                    '<tr class="text-center">' . 
                                        '<th class="bg-color-3 color-1">Nombre del usuario</th>' . 
                                        '<th class="bg-color-3 color-1">Deportes</th>' .
                                    '</tr>' .
                                '</thead>';

                        foreach ($usuariosDeportes as $nombreUsuario => $deportes){
                            
                            echo'<tr class="text-center">' . 
                                    '<td>' . $nombreUsuario . '</td>' .
                                    '<td>' . implode(', ', $deportes) . '</td>' .
                                '</tr>';
                        }
                        echo  '</table>';
                    } else {
                        echo "No hay filas que mostrar";
                    }
                ?>
            </section>

        </main>

</body>
</html>