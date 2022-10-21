<?php

session_start();

extract($_REQUEST);

require 'BDconect.php';

$clave = ($_REQUEST['clave']);
$correo = $_REQUEST['correo'];

$objConexion = new MySQLi($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

$xcomi="'";

$consultadb="SELECT * FROM usuario where email_usuario = " .$xcomi.$correo. $xcomi. " and contrasena_usuario = " .$xcomi.$clave.$xcomi;

$resultado=$objConexion->query($consultadb);
$existe=$resultado->num_rows;

if ($existe==1 && $correo=='david@misena.edu.co'){
    $usuario=$resultado->fetch_object();
    $_SESSION['user'] =$usuario->nombre_usuario;
   //header("location:../indexadmin.html?pag=contenido");
    echo '<script> alert("Bienvenido a Retornemos "); window.location.href="http://localhost/retornemos_v3/indexadmin.html"</script>';
    }
elseif ($existe==1){    
    $usuario=$resultado->fetch_object();
    $_SESSION['user'] =$usuario->nombre_usuario;
    //header("location:../indexusuario.html?pag=contenido");
    echo '<script> alert("Bienvenido a Retornemos "); window.location.href="http://localhost/retornemos_v3/indexusuario.html"</script>';
    }
    
else{    
    echo '<script> alert("Usuario y/o contraseña errado, intente de nuevo "); window.location.href="http://localhost/retornemos_v3/inicio.html"</script>';
   // header("location:../inicio.html?pag=contenido");
    }


?>