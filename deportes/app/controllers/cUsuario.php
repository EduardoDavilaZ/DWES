<?php 
    require_once './models/mUsuario.php';
    class cUsuario{
        public $objUsuario;
        public $vista;
        public $exito;
        public $mensaje;
        public function __construct(){
            $this->objUsuario = new MUsuario();
            $this->vista = '';
            $this->mensaje = '';
            $this->exito = false;
        }

        public function iniciarSesion(){
            $this->vista = 'vInicioSesion';
            return ['mensaje' => $this->mensaje, 'exito' => $this->exito];
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

            if ($usuario && password_verify($password, $usuario['password']) && $usuario['perfil'] == 'c') {
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];
                $this->exito = true;
                header("Location: index.php?c=Deporte&m=usuariosConDeportes");
            }else {
                $this->mensaje = 'Correo y contraseña incorrecta.';
                $this->exito = false;
                return $this->iniciarSesion();
            }
        }

        public function cerrarSesion() {
            session_start();
            $_SESSION = [];
            session_destroy();
            header("Location: index.php");
            exit;
        }
    }
?>