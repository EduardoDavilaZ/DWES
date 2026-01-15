<?php 
    require_once 'mConectar.php';

    class MMinijuego extends Conectar {
        public function __construct(){
            parent::__construct();
        }

        public function listarMinijuegos(){
            $sql = 'SELECT * FROM minijuegos;';

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }
        
        public function obtenerJuego($idMinijuego){
            $sql = 'SELECT * FROM minijuegos WHERE idMinijuego = :idMinijuego';

            try{
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute(['idMinijuego' => $idMinijuego]);
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $e){
                return $e->getCode();
            }
        }
    }
?>