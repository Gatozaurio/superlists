<?php 
    /* var_dump($_SERVER);
    die(); *//* 
    $url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    var_dump($_SERVER);
    die(); */

    require_once 'setup.php';
    require_once 'database/conexion.php';
    require_once 'includes/header.php'; 
?>
<?php

$password = "manola";
$password_segura = '$2y$10$P9ryf/1MSrSmqLSjVoAG/.2tJlttOcKvmuClAOLdsORt8CPPrVPt6';

if( password_verify( $password, $password_segura)){
    echo "Contraseña correcta";
}else{
    echo "Contraseña incorrecta";
}

?>

<?php require_once 'includes/footer.php'; ?>