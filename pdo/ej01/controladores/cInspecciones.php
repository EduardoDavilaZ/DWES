<?php 
    require_once '../modelos/Hotel.php';
    require_once '../modelos/Inspeccion.php';
    

    class CInspecciones {

        public $objInspeccion;
        public $objHotel;
        public $vista;

        public function __construct() {
            $this->objHotel = new Hotel;
            $this->objInspeccion = new Inspeccion;
        }

        public function listarInspecciones (){
            $inspecciones = $this->objInspeccion->listar();
            $this->vista = 'listarInspecciones';
            return $inspecciones;
        }

        public function crearInspeccion (){
            $hoteles = (new Hotel())->listarHoteles();
            $this->vista = 'registrarInspeccion';
            return ['hoteles' => $hoteles];
        }

        public function guardarInspeccion (){
            $nombreResponsable = !empty($_POST['nombreResponsable']) ? $_POST['nombreResponsable'] : NULL;
            $fecha = !empty($_POST['fecha']) ? $_POST['fecha'] : date("Y-m-d H:i:s");
            $idHotel = $_POST['hotel'];
            $resultado = $this->objInspeccion->crearInspeccion($nombreResponsable, $fecha, $idHotel);
            $this->vista = 'ListarInspecciones';
            return $resultado;
        }

        public function guardarModificacion(){
            $idRevision = $_GET['idRevision'];
            $inspeccion = (new Inspeccion())->obtenerInspeccion($idRevision);

            $nombreResponsable = !empty($_POST['nombreResponsable']) ? $_POST['nombreResponsable'] : $inspeccion['nombreResponsable'];
            $fecha = $_POST['fecha'];
            $idHotel = $_POST['hotel'];

            $this->objInspeccion->modificar($idRevision, $nombreResponsable, $fecha, $idHotel);
            $this->vista = 'ListarInspecciones';
        }

        public function modificarInspeccion() {
            $idRevision = $_GET['idRevision'];
            $inspeccion = (new Inspeccion())->obtenerInspeccion($idRevision);
            $hoteles = (new Hotel())->listarHoteles();
            $this->vista = 'modificarInspeccion';
            return ['inspeccion' => $inspeccion, 'hoteles' => $hoteles];
        }

        public function eliminarInspeccion($idRevision){
            $this->objInspeccion->eliminar($idRevision);
            $this->vista = 'listarInspecciones';
        }
    }
?>