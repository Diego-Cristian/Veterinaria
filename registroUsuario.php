<?php
    require_once('app/model/Usuario.php');
    // Conectarme a la Base de Datos
    $usuario = new Usuario();
    require_once('partes/header.html');

    if(  !isset( $_POST['email'] ) && !isset( $_POST['apellido']) && !isset( $_POST['nombre']) && !isset( $_POST['telefono']) && !isset($_POST['password']) ) {
        echo "<div class='alert alert-warning mt-4' role='alert'>
                    Debe completar todos los campos
                </div>";
        return;
    }
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usuario->nombre = $nombre;
    $usuario->apellido = $apellido;
    $usuario->telefono = $telefono;
    $usuario->email = $email;
    $usuario->password = $password;
    $usuario->rol_id = 4;  // Rol Cliente

    $usuario->guardar();
    

    require_once('partes/modalLogin.html');
    require_once('partes/footer.html');

?>