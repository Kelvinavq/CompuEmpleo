<?php


include("../config/conexion.php");

$correo = $_POST['correo'];

$validar_login = $connection->prepare("SELECT * FROM empresa WHERE email = '$correo'");

$validar_login->execute();

if ($validar_login->rowCount() > 0) {
  session_start();

  $_SESSION['usuario'] = $correo;

  header("location: login2.php");
}else{
  header("location: registro.php");

}
