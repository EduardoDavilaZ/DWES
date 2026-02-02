<?php
    // Si no existe idUsuario en la sesión, redirige al login
    if (!isset($_SESSION['idUsuario'])) {
        header("Location: index.php?c=Usuario&m=inicioSesion");
        exit;
    }
?>