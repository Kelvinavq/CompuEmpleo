<?php


include("../config/conexion.php");

$correo = $_POST['correo'];

$validar_login = $connection->prepare("SELECT * FROM usuario WHERE email = '$correo'");

$validar_login->execute();

if ($validar_login->rowCount() > 0) {
  session_start();

  $_SESSION['usuario'] = $correo;

  header("location: ../views/login2.php");
}else{
  header("location: ../views/registro.php");

}
