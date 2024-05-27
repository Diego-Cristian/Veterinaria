<?php
    require_once('app/model/Usuario.php');
    // Conectarme a la Base de Datos
    $usuario = new Usuario();
    require_once('partes/header.html');


    if(  !isset( $_POST['email'] ) && !isset($_POST['password']) ) {
        echo "Datos ivalido";
        return;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $respuesta = $usuario->loguear($email, $password);

    if( count($respuesta) > 0 ){
        // llamar a una funcion para el login
        session_start();
        $_SESSION['email'] = $respuesta[0]['email'];
        $_SESSION['persona_id'] = $respuesta[0]['persona_id'];
        $_SESSION['rol_id'] = $respuesta[0]['rol_id'];
        $_SESSION['rol'] = $respuesta[0]['rol'];

        header('location: turnos.php');
    } else {
        echo "<div class='alert alert-warning mt-4' role='alert'>
                Usuario o Contraseña incorrectos
            </div>";
    }

    require_once('partes/modalLogin.html');
    require_once('partes/footer.html');

?>