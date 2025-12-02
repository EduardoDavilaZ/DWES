<?php
    require_once './db/Conectar.php';

    class Profesor extends Conectar{

        public function __construct(){
            parent::__construct();
        }

        public function listarProfesores(){
            $sql = "SELECT * FROM profesores;";

            try{
                $resultado = $this->conexion->query($sql);
                $profesores = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $profesores;
            } catch(PDOException $e){
                die("Error en la consulta: " . $e->getMessage());
            }
        }

        public function obtenerProfesor($idProfesor){
            $sql = "SELECT * FROM profesores WHERE idProfesor = :idProfesor;";

            try {
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idProfesor' => $idProfesor]);
                $profesor = $sth->fetch(PDO::FETCH_ASSOC);
                return $profesor;
            } catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function modificar($idProfesor, $nombre){
            $sql = "UPDATE profesores SET nombre = :nombre WHERE idProfesor = :idProfesor;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idProfesor' => $idProfesor, 'nombre' => $nombre]);
                return $sth->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function eliminar($idProfesor){
            $sql = "DELETE FROM profesores WHERE idProfesor = :idProfesor;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idProfesor' => $idProfesor]);
                return $sth->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
?>