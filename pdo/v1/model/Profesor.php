<?php 
    require_once '../db/Conectar.php';

    class Profesor extends Conectar {

        public function __construct(){
            parent::__construct();
        }

        public function modificar($idProfesor, $nuevoNombre){
            $sql = "UPDATE profesores SET nombre = :nuevoNombre WHERE idProfesor = :idProfesor;";

            try {
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['nuevoNombre' => $nuevoNombre, 'idProfesor' => $idProfesor]);
                
                return $sth->rowCount() > 0 ? true : false;

            } catch (PDOException $e) {
                die("Error al modificar: " . $e->getMessage());
            }
        }

        public function eliminar($idProfesor){
            $sql = "DELETE FROM profesores WHERE idProfesor = :idProfesor;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idProfesor' => $idProfesor]);

                return $sth->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                die("Error al eliminar: " . $e->getMessage());
            }
        }

        public function listarProfesores(){
            $sql = "SELECT * FROM profesores ORDER BY idProfesor;";
            try{
                $resultado = $this->conexion->query($sql);
                return $resultado; 
            } catch (PDOException $e){
                die("Error al listar: " . $e->getMessage());
            }
        }
    }
?>