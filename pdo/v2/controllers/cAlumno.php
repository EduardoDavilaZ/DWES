<?php
    require_once './models/Alumno.php';
    require_once './models/Inscripcion.php';

    class CAlumno{

        public  $vista;
        public $layout;
        public $objAlumno;
        public $idAlumno;

        public function __construct(){
            $this->objAlumno = new Alumno();
            $this->idAlumno = $_GET['idAlumno'] ?? null;
            $this->layout = 'layout';
        }

        public function listarAlumnos(){
            $inscripciones = (new Inscripcion())->listarInscripciones();
            $alumnos = ($this->objAlumno)->listarAlumnos();
            $this->vista = 'crudAlumnos';
            return ['inscripciones' => $inscripciones, 'alumnos' => $alumnos];
        }
    }


?>