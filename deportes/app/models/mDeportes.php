<?php

    require_once 'mConectar.php';

    class MDeporte extends Conectar{

        public function __construct(){
            parent::__construct();
        }

        public function listarUsuariosConDeportes(){
            $sql = "SELECT u.nombreUsuario, d.nombreDep FROM usuarios_deportes ud
                    INNER JOIN usuarios u ON ud.idUsuario = u.idUsuario
                    INNER JOIN deportes d ON ud.idDeporte = d.idDeporte
                    ORDER BY  u.nombreUsuario;";

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function totalDeportesConUsuarios(){
            $sql = "SELECT COUNT(DISTINCT(ud.idDeporte)) AS total FROM usuarios_deportes ud;";

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function deportesConTotalUsuarios(){
            $sql = 'SELECT d.idDeporte AS id, d.nombreDep as nombre, COUNT(ud.idUsuario) AS total
                    FROM usuarios_deportes ud
                    INNER JOIN deportes d ON ud.idDeporte = d.idDeporte
                    GROUP BY d.nombreDep;';

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }
    }
?>