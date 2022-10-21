
<?php
// DB CREDENCIALES DE USUARIO.
$DB_HOST='localhost';
$DB_USER='root';
$DB_PASS='Yubi1989*';
$DB_NAME='retornemos';
 

$objConexion = new MySQLi($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);


if ($objConexion->connect_errno)

{
    echo"Error de Conexion a la base dedatos".$objConexion->connect_error;
    exit();
}
else{
    echo"Conectados al Servidor y listos para utilizar la Base de datos ".$DB_NAME;
}

