<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Inicio'); 
?>
<body>
    <?php 
        require_once 'partials/header.php';
    ?>
    
    <main class="container">
        <div class="my-4">
            <a class="bg-color-3 color-1 rounded p-2" href="index.php?c=Deporte&m=vAñadir"><i class="bi bi-plus-square"></i> Añadir</a>
        </div>

        <?php
            if ($deportesUsuarios){
                echo  '<table class="table mt-2">' . 
                        '<thead>' .
                            '<tr class="text-center">' . 
                                '<th class="bg-color-3 color-1">Deporte</th>' . 
                                '<th class="bg-color-3 color-1">Número de usuarios</th>' .
                                '<th class="bg-color-3 color-1">Modificar</th>' .
                                '<th class="bg-color-3 color-1">Eliminar</th>' .
                            '</tr>' .
                        '</thead>';

                foreach ($deportesUsuarios as $du){
                    echo'<tr class="text-center">' . 
                            '<td>' . $du['nombre'] . '</td>' .

                            '<td>' . $du['total'] . '</td>' .
                            
                            '<td>' . 
                                '<a class="color-3" href="index.php?c=Deporte&m=vModificar&id='. $du['id'] .'">
                                    <i class="bi bi-pencil-square"></i>
                                </a>' . 
                                '</td>' .
                            '<td>' . 
                                '<a class="color-3" href="index.php?c=Deporte&m=eliminar&id='. $du['id'] .'" onclick="return confirm(\'¿Está seguro de eliminar?\')">
                                    <i class="bi bi-trash"></i>
                                </a>' .
                            '</td>'.
                        '</tr>';
                }
                echo  '</table>';
            } else {
                echo "No hay filas que mostrar";
            }
        ?>
    </main>

</body>
</html>