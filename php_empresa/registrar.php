<?php

include("../config/conexion.php");


$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$pass2 = md5($pass);
$nombre_empresa = $_POST['nombre_empresa'];
$estado = $_POST['estado'];

$tipo_identificacion = $_POST['tipo_identificacion'];
$numero_identificacion = $_POST['numero_identificacion'];
$direccion = $_POST['direccion'];
$logo = (isset($_FILES['logo']['name'])) ? $_FILES['logo']['name'] : "";

$numero_trabajadores = $_POST['numero_trabajadores'];
$descripcion_empresa = $_POST['descripcion_empresa'];




$fecha = new DateTime();

$nombreArchivo = ($logo != "") ? $fecha->getTimestamp() . "_" . $_FILES['logo']['name'] : "img.png";
$tmplogo = $_FILES['logo']['tmp_name'];

if ($tmplogo != "") {
    move_uploaded_file($tmplogo, "../assets/logo_empresa/" . $nombreArchivo);
}

$sql = $connection->prepare("INSERT INTO empresa (nombre, telefono, email, pass, nombre_empresa, estado, tipo_id, rif, direccion, numero_trabajadores, descripcion, logo) VALUES('$nombre', '$telefono', '$correo', '$pass2', '$nombre_empresa', '$estado', '$tipo_identificacion', '$numero_identificacion', '$direccion', '$numero_trabajadores', '$descripcion_empresa', '$nombreArchivo')");

$sql->execute();

header("location: ../empresa/index.php");


?>