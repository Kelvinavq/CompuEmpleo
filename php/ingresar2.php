<?php
include("../config/conexion.php");

$correo = $_POST['correo'];
$pass = $_POST['pass'];
$pass2 = md5($pass);


$validar_login = $connection->prepare("SELECT * FROM usuario WHERE email = '$correo' AND pass = '$pass2'");

$validar_login->execute();


if ($validar_login->rowCount() > 0) {
    session_start();
  
    $_SESSION['usuario'] = $correo;
  
    header("location: ../views/usuario.php");
  }

?>