<?php
    require_once('app/core/ConexionDB.php');
    class Usuario extends ConexionPDO{
        // Atributos
        public $perona_id;
        public $nombre;
        public $apellido;
        public $email;
        public $telefono;
        public $rol_id;
        public $password;

        // Metodos
        public function loguear($name, $pass){
            $this->query = "SELECT P.persona_id, P.nombre, P.apellido,  P.email, P.rol_id, R.descripcion AS rol
                            FROM personas P
                            INNER JOIN roles R ON R.rol_id = P.rol_id 
                            WHERE P.email = :email AND P.password = :password ";
            $this->obtenerRows(array(
                ':email' => $name,
                ':password' => $pass
            ));
            return $this->rows;
        }

        public function guardar(){
            $this->query = "INSERT INTO personas (nombre, apellido, email, password, telefono, rol_id)
                            VALUES(:nombre, :apellido, :email, :password, :telefono, :rol_id)";

            $this->ejecutar( array(
                ':nombre' => $this->nombre,
                ':apellido' => $this->apellido,
                ':email' => $this->email,
                ':password' => $this->password,
                ':telefono' => $this->telefono,
                ':rol_id' => $this->rol_id
            ));
        }

        public function actualizar(){
            $this->query = "UPDATE personas 
                            SET nombre = :nombre,
                                apellido = :apellido,
                                password  = :password,
                                telefono = :telefono
                            WHERE persona_id = :persona_id ";

            $this->ejecutar( array(
                ':nombre' => $this->nombre,
                ':apellido' => $this->apellido,
                ':password' => $this->password,
                ':telefono' => $this->telefono,
                ':persona_id' => $this->persona_id
            ));
        }

    }

?>