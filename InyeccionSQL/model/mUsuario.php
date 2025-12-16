<?php 
    require_once __DIR__ . '/mConexion.php';
    class MUsuario extends Conexion{

        public function registrarUsuario ($nombre, $correo, $pw){
            $sql = 'INSERT INTO usuarios (nombre, correo, pw) VALUES (:nombre, :correo, :pw);';

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['nombre' => $nombre, 'correo' => $correo, 'pw' => $pw]);
                return $this->conexion->lastInsertId();
            } catch(PDOException $e){
                return ['resultado' => false, 'error' => $e->getCode()];
            }
        }

public function obtenerUsuario ($correo){
    $sql = 'SELECT * FROM usuarios WHERE correo = :correo';

    try{
        $sth = $this->conexion->prepare($sql);
        $sth->execute(['correo' => $correo]);
        $usuario = $sth->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    } catch(PDOException $e){
        return ['resultado' => false, 'error' => $e->getCode()];
    }
}

        /**
         * Esta consulta insegura concatena el correo y contraseña, al poner una
         * condición positiva la consulta devuelve filas, por lo que ingresaré a la
         * aplicación como el primer usuario que devuelva la consulta. 
         */

        public function obtenerUsuarioInseguro($correo, $pw) {
            $sql = "SELECT * FROM usuarios  WHERE correo = '$correo' AND pw = '$pw'";
            $resultado = $this->conexion->query($sql);
            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        
    }
?>