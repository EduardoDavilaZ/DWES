<?php 
    require_once './models/mInscripcion.php';
    require_once './models/mDeportes.php';

    class CInscripcion{

        public $vista;
        public $objInscripcion;
        public $objDeportes;
        public $mensaje; 
        public $deportes;

        public function __construct(){
            $this->vista = '';
            $this->mensaje = '';
            $this->objInscripcion = new mInscripcion();
            $this->deportes = $this->objInscripcion->obtenerDeportes();
            $this->objDeportes = new mDeporte();
        }
        
        public function inscripcion(){
            $this->vista = 'vInscripcion';
            return ['deportes' => $this->deportes];
        }

        public function guardarInscripcion(){
            var_dump($_POST);

            if (!empty( $_POST['nombre'])){
                $nombre = $_POST['nombre'];
            } else {
                $this->mensaje = 'Falta el nombre';
                $this->vista = 'vInscripcion';
                return ['mensaje' => $this->mensaje, 'deportes' => $this->deportes];
            }

            if (!empty($_POST['apeNombre'])){
                $apeNombre = $_POST['apeNombre'];
            } else {
                $this->mensaje = 'Falta el nombre y el apellido';
                $this->vista = 'vInscripcion';
                return ['mensaje' => $this->mensaje, 'deportes' => $this->deportes];
            }

            if (!empty($_POST['password'])){
                $password = $_POST['password'];
            } else {
                $this->mensaje = 'Falta la contraseña';
                $this->vista = 'vInscripcion';
                return ['mensaje' => $this->mensaje, 'deportes' => $this->deportes];
            }

            if (!empty($_POST['correo'])){
                $correo = $_POST['correo'];
            } else {
                $this->mensaje = 'Falta el correo';
                $this->vista = 'vInscripcion';
                return ['mensaje' => $this->mensaje, 'deportes' => $this->deportes];
            }

            if (!empty($_POST['telefono'])){
                $telefono = $_POST['telefono'];
            } else {
                $this->mensaje = 'Falta el telefono';
                $this->vista = 'vInscripcion';
                return ['mensaje' => $this->mensaje, 'deportes' => $this->deportes];
            }

            if (isset($_POST['condiciones'])){
                $condiciones = $_POST['condiciones'];
            } else {
                $this->mensaje = 'Debe aceptar las condiciones';
                $this->vista = 'vInscripcion';
                return ['mensaje' => $this->mensaje, 'deportes' => $this->deportes];
            }

            if (isset($_POST['deporte'])){
                $deporte = $_POST['deporte'];
            } else {
                $this->mensaje = 'Falta elegir el deporte';
                $this->vista = 'vInscripcion';
                return ['mensaje' => $this->mensaje, 'deportes' => $this->deportes];
            }

            $resultado = $this->objInscripcion->añadir($nombre, $apeNombre, $password, $correo, $telefono, $deporte);
            
            if ($resultado){
                $this->mensaje = 'Usuario añadido';
            } else {
                $this->mensaje = 'Error al inscribirse';
            }

            $this->vista = 'vInscripcion';
            return ['mensaje' => $this->mensaje, 'deportes' => $this->deportes];
        }

        public function usuariosConDeportes(){
            $listarUsuariosConDeportes  = $this->objDeportes->listarUsuariosConDeportes();
            $deportesConUsuariosInscritos = $this->objDeportes->totalDeportesConUsuarios();

            
            $this->vista = 'vDeportesUsuarios';
            
            $usuariosDeportes = [];

            foreach ($listarUsuariosConDeportes as $ud) {
                $usuariosDeportes[$ud['nombreUsuario']][] = $ud['nombreDep'];
            }

            return ['usuariosDeportes' => $usuariosDeportes, 'total' => $deportesConUsuariosInscritos['total']];
        }

        public function deportes(){
            $deportesUsuarios  = $this->objDeportes->deportesConTotalUsuarios();
            $this->vista = 'vDeportes';
            return ['deportesUsuarios' => $deportesUsuarios];
        }

    }
?>   