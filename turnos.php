<?php
    session_start();
    require_once('partes/header.html');
    require_once('partes/modalLogin.html');

    if( isset( $_SESSION['email'])){
        require_once('pages/turnos.html');

        echo "Panel de admin " . $_SESSION['email'];
        echo "Panel de admin " . $_SESSION['rol'];

    
    
    } else {

        echo "<div class='alert alert-info mt-4' role='alert'>
                    Página Privada
                </div>";
        echo "<a href='index.php'>Volver</a>";
    }
    require_once('partes/footer.html');


?>