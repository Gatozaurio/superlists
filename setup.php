<?php
/** Construimos la URL */
/** TODO: Integrar el puerto en la dirección */
$url = $_SERVER['REQUEST_SCHEME']."://";
$serverName = $_SERVER['SERVER_NAME']."/";
$urlParts = explode("/", $_SERVER['REQUEST_URI']);
$request = $urlParts[1]."/";

/** URL principlal de la aplicación */
define('APP_URL',$url.$serverName.$request);
//define('APP_URL', 'http://localhost/superlists/');
/** Directorio principal de la aplicación en el servidor */
define('APP_PATH', __DIR__);
/** Nombre de la aplicación */
define('APP_NAME', 'SuperLists');