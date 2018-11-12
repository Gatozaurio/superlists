<?php

    require_once '../database/conexion.php';

    if( isset($_POST['registro'])){
        $username = $_POST['username'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $passwordconf = $_POST['password-conf'] ?? null;

        //var_dump($_POST);

        // Array de errores
        $errors = [];

        // Validaciones
        // username:
        if ( empty($username) ){
            $errors['username']['empty'] = "Debes introducir un nombre.";
            $username = null;
        }

        if ( strlen($username) < 8 ) {
            $errors['username']['length'] = "El nombre de usuario debe tener al menos 8 caracteres.";
            $username = null;
        }

        if ( !preg_match("/[0-9a-z]+/",$username) ){
            $errors['username']['format'] = "El nombre solo admite números y letras minúsculas.";
            $username = null;
        }
    
        // email:
        if ( empty($email) ){
            $errors['email']['empty'] = "Debes introducir un email.";
            $email = null;
        }

        if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
            $errors['email']['format'] = "Debes introducir un email válido.";
            $email = null;
        }
    
        // password:
        if ( empty($password) ){
            $errors['password']['empty'] = "Debes facilitar una contraseña.";
        }
    
        if ( strlen($password) < 6 ) {
            $errors['password']['length'] = "La contraseña debe tener al menos 6 caracteres.";
        }

        if ( empty($passwordconf) ){
            $errors['passwordconf']['empty'] = "Debes confirmar la contraseña.";
        }

        if ( $password != $passwordconf ){
            $errors['passwordconf']['match'] = "Las contraseñas no coinciden.";
        }
    
        if( empty($errors) ){
            $password_segura = password_hash($password, PASSWORD_BCRYPT);

           // echo "Guardar en la BD";
           $query = "INSERT into users VALUES(NULL, '$username', '$email', '$password_segura', NOW(), NOW())";

           $result = mysqli_query($db, $query);

            if( $result ){ // Si todo va bien redirige al index
                header("Location: /superlists/");
            }else{
                die("La cagamos guardando el usuario.");
            }

            die();
        }
    }

    require 'register.view.php';