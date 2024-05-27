<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['persona_id']);
    unset($_SESSION['rol_id']);
    unset($_SESSION['rol']);

    header('location: index.php');
?>