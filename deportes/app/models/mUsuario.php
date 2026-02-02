<?php
    require_once 'mConectar.php';

    class MUsuario extends Conectar{
        public function __construct(){
            parent::__construct();
        }

        public function obtenerUsuario ($correo){
            $sql = 'SELECT * FROM Usuarios WHERE correo = :correo';

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['correo' => $correo]);
                $usuario = $sth->fetch(PDO::FETCH_ASSOC);
                return $usuario;
            } catch(PDOException $e){
                return ['resultado' => false, 'error' => $e->errorInfo[1]];
            }
        }
    }
?>