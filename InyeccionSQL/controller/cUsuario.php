<?php 
    require_once 'model/mUsuario.php';

    class CUsuario{
        public $vista;
        public $objUsuario;

        public function __construct(){
            $this->objUsuario = new MUsuario();
            $this->vista = "";
        }

        /**
         * Cargar vistas
         */

        public function iniciarSesion(){
            $this->vista = 'inicioSesion';
        }

        public function registrar(){
            $this->vista = 'registro';
        }

        /**
         * Recoge los datos del formulario y compara el password introducido
         * con el pw de la bd. Si es correcto las variables van a $_SESSION
         * para ser usadas en otras vistas.
         */

        public function inicioSesion(){
            if (!empty($_POST['correo']) && !empty($_POST['pw'])){
                $correo = $_POST['correo'];
                $pw = $_POST['pw'];
            } else {
                header("Location: ./index.php");
            }

            $usuario = $this->objUsuario->obtenerUsuario($correo);

            if (password_verify($pw, $usuario['pw'])) {
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $this->vista = 'inicio';
            }else {
                header("Location: ./index.php");
                exit;
            }
        }

        public function inicioSesionInseguro() {
            $correo = $_POST['correo'];
            $pw = $_POST['pw'];

            $usuario = $this->objUsuario->obtenerUsuarioInseguro($correo, $pw);

            if ($usuario) {
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $this->vista = 'inicio';
            } else {
                header("Location: ./index.php");
                exit;
            }
        }

        /**
         * Registrar usuario, conviertiendo el password a un hash con bcrypt
         * y registrarlo en la bd.
         */

        public function registro(){
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $pw = $_POST['pw'];

            $pw_hash = password_hash($pw, PASSWORD_BCRYPT);
            
            $idUsuario = $this->objUsuario->registrarUsuario($nombre, $correo, $pw_hash);

            if ($idUsuario){
                $_SESSION['idUsuario'] = $idUsuario;
                $_SESSION['nombre'] = $nombre;
                $this->vista = 'inicio';
            } else {
                header("Location: ./index.php");
            }
        }

        public function cerrarSesion(){
            session_destroy();
            header("Location: ./index.php");
        }
    }

?>