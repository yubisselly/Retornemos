<?php

extract($_REQUEST);
require 'BDconect.php';
$objConexion = new MySQLi($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

$idusuario = $_REQUEST['idusuario'];
$nombre1 = $_REQUEST['nombre1'];
$nombre2 = $_REQUEST['nombre2'];
$apellido1 = $_REQUEST['apellido1'];
$apellido2 = $_REQUEST['apellido2'];
$telefono = $_REQUEST['telefono'];
$correo= $_REQUEST['correo'];
$contrasena= md5($_REQUEST['contrasena']);
$rol= $_REQUEST['rol'];
$bienestar= $_REQUEST['centroformativo'];

$nombrecompleto = $nombre1." ".$nombre2;
$apellidocompleto = $apellido1." ".$apellido2;

// if ($rol == 'aprendiz')
// {
//     $rol='1';
// }
// elseif ($rol == 'instructor')
// {
//     $rol='2';
// }
// else
// {
//     $rol='3';  
// }

// if ($centroformativo =='CTGI')
// {
//     $bienestar='001-1';
// }
// elseif($centroformativo =='CTMA')
// {
//     $bienestar='001-2';
// }
// else
// $bienestar='001-3';

$consultadb="SELECT * FROM retornemos.usuario where ID_usuario = '$idusuario';";
$resultado=$objConexion->query($consultadb);
$existe=$resultado->num_rows;

if ($existe==1)
{    
    $usuario=$resultado->fetch_object();
    echo '<script> alert("Usuario ya registrado, intente de nuevo "); window.location.href="http://localhost/retornemos_v3/registro.html"</script>';
}

$consultadb="INSERT INTO `retornemos`.`usuario` (`ID_usuario`, `nombre_usuario`, `apellido_usuario`, `telefono_usuario`, `direccion_usuario`, `email_usuario`, `contrasena_usuario`, `ID_bienestar`,`ID_rol`) VALUES ('$idusuario','$nombrecompleto','$apellidocompleto','$telefono','$direccion','$correo','$contrasena','$bienestar','$rol');";
echo $consultadb;


if ($objConexion->query($consultadb))
{
    //header("location:../indexusuario.html?pag=contenido");
    echo '<script> alert("Registro exitoso, bienvenido a Retornemos "); window.location.href="http://localhost/retornemos_v3/indexusuario.html"</script>';
}
// else{
//     //header("location:registro.html?pag=contenido=2");
//     echo '<script> alert("Usuario ya registrado, intente de nuevo "); window.location.href="http://localhost/retornemos_v3/inicio.html"</script>';

// }



?>