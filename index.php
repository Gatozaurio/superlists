<?php

require_once 'setup.php';
require_once 'database/conexion.php';
require_once 'includes/header.php'; 

if( password_verify( $password, $password_segura)){
    $_SESSION['userdata'] = $usuario;
    header("Location: ".APP_URL);/////
}else{
    echo "Contraseña incorrecta";
}

require_once 'includes/footer.php';

?>