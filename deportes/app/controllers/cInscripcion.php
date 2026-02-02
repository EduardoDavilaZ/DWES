<?php 
    require_once './models/mInscripcion.php';
    require_once './models/mDeportes.php';

    class CInscripcion{
        public $vista;
        public $objInscripcion;
        public $objDeportes;
        public $mensaje; 
        public $deportes;
        public $exito;

        public function __construct(){
            $this->vista = '';
            $this->mensaje = '';
            $this->exito = false;
            $this->objInscripcion = new mInscripcion();
            $this->deportes = $this->objInscripcion->obtenerDeportes();
            $this->objDeportes = new mDeporte();
        }

        public function inscripcion(){
            $this->vista = 'vInscripcion';
            return ['deportes' => $this->deportes, 'mensaje' => $this->mensaje, 'exito' => $this->exito];
        }
        public function guardarInscripcion() {
            if (empty($_POST['nombre'])) {
                $this->mensaje = 'Falta el nombre';
                return $this->inscripcion();
            }
            $nombre = $_POST['nombre'];

            if (empty($_POST['apeNombre'])) {
                $this->mensaje = 'Falta el nombre y el apellido';
                return $this->inscripcion();
            }
            $apeNombre = $_POST['apeNombre'];

            if (empty($_POST['password'])) {
                $this->mensaje = 'Falta la contraseña';
                return $this->inscripcion();
            }
            $passwordPlano = $_POST['password'];
            $passwordHash = password_hash($passwordPlano, PASSWORD_BCRYPT);

            if (empty($_POST['correo'])) {
                $this->mensaje = 'Falta el correo';
                return $this->inscripcion();
            }
            $correo = $_POST['correo'];

            $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : null;

            if (!isset($_POST['condiciones'])) {
                $this->mensaje = 'Debe aceptar las condiciones';
                return $this->inscripcion();
            }

            if (!isset($_POST['deporte'])) {
                $this->mensaje = 'Falta elegir el deporte';
                return $this->inscripcion();
            }
            $deporte = $_POST['deporte'];

            $resultado = $this->objInscripcion->añadir($nombre, $apeNombre, $passwordHash, $correo, $telefono, $deporte);

            if ($resultado === true) {
                $this->mensaje = 'Usuario añadido correctamente';
                $this->exito = true;
            } else {
                switch ($resultado) {
                    case 1062: $this->mensaje = 'Error de clave duplicada, prueba con otro usuario'; break;
                    case 1406: $this->mensaje = 'Algún dato excede el tamaño permitido'; break;
                    default: $this->mensaje = 'Error en la base de datos'; break;
                }
                $this->exito = false;
            }
            return $this->inscripcion();
        }
        
    }
?>   