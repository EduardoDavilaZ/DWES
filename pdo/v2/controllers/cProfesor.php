<?php
    require_once './models/Profesor.php';

    class CProfesor {

        public  $vista;
        public $layout;
        public $objProfesor;
        public $idProfesor;
    
        public function __construct(){
            $this->objProfesor = new Profesor();
            $this->layout = 'layout';
            $this->idProfesor = $_GET['idProfesor'] ?? null;;
        }   
        
        public function listarProfesores(){
            $profesores = $this->objProfesor->listarProfesores();
            $this->vista = 'crudProfesores';
            return ['profesores' => $profesores];
        }
    
        public function modificar(){
            $tutor = ($this->objProfesor->obtenerProfesor($this->idProfesor))->fetch(PDO::FETCH_ASSOC);

            $this->vista = 'modificarProfesor';
            return ['tutor' => $tutor];
        }

        public function guardarModificacion(){
            $tutor = ($this->objProfesor->obtenerProfesor($this->idProfesor))->fetch(PDO::FETCH_ASSOC);
            echo 'soy yo'. $tutor['nombre'];
            echo 'idProfeosro' . $this->idProfesor;
            $nombre = empty($_POST['nombre']) ? $tutor['nombre'] : $_POST['nombre'];

            if ($this->objProfesor->modificar($this->idProfesor, $nombre)){
                header('Location: index.php?c=Profesor&m=listarProfesores');
            } 
        }

        public function eliminar(){
            if ($this->objProfesor->eliminar($this->idProfesor)){
                header('Location: index.php?c=Profesor&m=listarProfesores');
            }
        }
    }
?>