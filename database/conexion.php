<?php

$db = mysqli_connect ("localhost", "root", "", "superlistsdb");

/* if( mysqli_connect_errno() ){
    die("La hemos cagao");
}else{
    die("Flama");
} */

mysqli_query($db, "SET NAMES 'utf8'"); // Lanza una consulta

?>