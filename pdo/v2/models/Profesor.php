<?php
    class Profesor extends Conectar{

        public function __construct(){
            parent::__construct();
        }

        public function listarProfesores(){
            $sql = "SELECT * FROM profesores;";

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado;
            } catch(PDOException $e){
                die("Error en la consulta: " . $e->getMessage());
            }
        }
    }
?>