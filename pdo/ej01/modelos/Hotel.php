<?php 
    require_once '../bd/Conectar.php';
    class Hotel extends Conectar{

        public function __construct(){
            parent::__construct();
        }

        public function listarHoteles(){
            $sql = "SELECT * FROM hoteles;";

            try{
                $resultado = $this->conexion->query($sql);
                $hoteles = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $hoteles;
            } catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
?>