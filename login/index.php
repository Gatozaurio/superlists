<?php 

require_once '../setup.php';

if( isset($_SESSION['userdata']) ){
    header("Location: ".APP_URL);
}

if(isset($_POST['login']) ){
    $username = trim($_POST['username']);
    $usernamesintrim = $_POST['username'];
    $password = trim($_POST['password']);

    if( empty($username) ){
        $errors['username']['empty'] = "Debes introducir un nombre de usuario.";
        $username = null;
    }

    if( empty($password) ){
        $errors['password']['empty'] = "Debes introducir una contraseña.";
        $password = null;
    }

    if( empty($errors) ){
        // Hemos recibido los datos
        // Haremos la consulta en la BD
        // Es bueno poner limit 1 para evitar coger la tabla entera
        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $login = mysqli_query($db, $sql);

        if( $login && mysqli_query($db, $sql) == 1 ){

            $usuario = mysqli_fetch_assoc($login);

            if( password_verify($password, $usuario['password'])){
                // Creo una sesión de usuario
               $_SESSION['userdata'] = $usuario;
            }else{
                $error['login']['password'] = "La contraseña no es correcta";
            }
        }  else{
            $errors['login']['username'] = "El usuario no es correcto";
        }
    }

    echo "*".$username."*";
}

require_once 'login.view.php';

?>