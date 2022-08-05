<?php

include("../config/conexion.php");


$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$pass2 = md5($pass);
$puesto_deseado = $_POST['puesto_deseado'];
$estado = $_POST['estado'];

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$tipo_identificacion = $_POST['tipo_identificacion'];
$numero_identificacion = $_POST['numero_identificacion'];
$estado_civil = $_POST['estado_civil'];
$telefono = $_POST['telefono'];
$genero = $_POST['genero'];
$titulo_curriculum = $_POST['titulo_curriculum'];
$descripcion_perfil = $_POST['descripcion_perfil'];
$foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";

$nivel_estudio = $_POST['nivel_estudio'];
$centro_educativo = $_POST['centro_educativo'];
$estado_nivel = $_POST['estado_nivel'];

$fecha = new DateTime();

$nombreArchivo = ($foto != "") ? $fecha->getTimestamp() . "_" . $_FILES['foto']['name'] : "img.png";
$tmpfoto = $_FILES['foto']['tmp_name'];

if ($tmpfoto != "") {
    move_uploaded_file($tmpfoto, "../assets/profile/" . $nombreArchivo);
}

$sql = $connection->prepare("INSERT INTO usuario (nombre, apellido, email, pass, puesto_deseado, dia, mes, ano, tipo_id, numero_id, estado_civil, telefono, estado, genero, titulo_curriculum, descripcion_perfil, nivel_estudios, centro_educativo, estado_estudio, foto) VALUES('$nombre', '$apellido', '$correo', '$pass2', '$puesto_deseado', '$dia', '$mes', '$ano', '$tipo_identificacion', '$numero_identificacion', '$estado_civil', '$telefono', '$estado', '$genero', '$titulo_curriculum', '$descripcion_perfil', '$nivel_estudio', '$centro_educativo', '$estado_nivel', '$nombreArchivo')");

$sql->execute();

header("location: ../views/login.php");


?>