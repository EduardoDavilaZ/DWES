<?php
    echo 
        '<header class="p-2">
            <h1 class="display-4 text-center">
                Minijuegos
            </h1>
        </header>
        
        <nav>
            <ul>
                <li><a href="index.php?c=Minijuego&m=listarMinijuegos"><i class="bi bi-joystick"></i> Minijuegos</a></li>
                <li><a href="index.php?c=Minijuego&m=vAñadir"><i class="bi bi-plus-square"></i> Añadir</a></li>
                <li><a href="index.php?c=Minijuego&m=exportarCSV"><i class="bi bi-file-arrow-up"></i> Exportar CSV</a></li>
                <li><a href="index.php?c=Minijuego&m=vImportarCSV"><i class="bi bi-file-arrow-down"></i> Importar CSV</a></li>
                <li><a href="index.php?c=Minijuego&m=crearPDF" target="_blank"><i class="bi bi-download"></i> Descargar PDF</a></li>
            </ul>
        </nav>';
?>