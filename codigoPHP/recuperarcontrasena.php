<?php

extract($_REQUEST);
require 'BDconect.php';
$objConexion = new MySQLi($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

$correo= $_REQUEST['correo'];
$idusuario = $_REQUEST['idusuario'];


$consultadb="SELECT email_usuario FROM retornemos.usuario where email_usuario = '$correo' and ID_usuario ='$idusuario';";
$resultado=$objConexion->query($consultadb);
$existe=$resultado->num_rows;



if ($existe==1)
{    
    $usuario=$resultado->fetch_object();
    echo '<script> alert("Revise su correo electronico y siga las indicaciones "); window.location.href="http://localhost/retornemos_v3/inicio.html"</script>';
}
else
{
    echo '<script> alert("datos ingresados errados o usuario no està registrado"); window.location.href="http://localhost/retornemos_v3/inicio.html"</script>';
}