<?php 
    require_once './models/mUsuario.php';
    class cUsuario{
        public $objUsuario;
        public $vista;
        public $mensaje;
        public function __construct(){
            $this->objUsuario = new MUsuario();
            $this->vista = '';
        }

        public function inicioSesion(){
            if (!empty($_POST['correo']) && !empty($_POST['password'])){
                $correo = $_POST['correo'];
                $password = $_POST['password'];
            } else {
                header("Location: index.php");
                exit;
            }

            $usuario = $this->objUsuario->obtenerUsuario($correo);

            if ($password ==  $usuario['password']) { // Sin verificación PASSWORD_VERIFY()
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];
                header("Location: index.php?c=Inscripcion&m=usuariosConDeportes");
            }else {
                header("Location: index.php");
                exit;
            }
        }

        public function cerrarSesion(){
            session_destroy();
            header("Location: index.php");
            exit;
        }
    }
?>