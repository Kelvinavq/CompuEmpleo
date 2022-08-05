<?php

include("../config/conexion.php");

$email = $_POST['correo'];
$bytes = random_bytes(5);
$token = bin2hex($bytes);

include("mail_reset.php");

if ($enviado) {

    $sql = $connection->prepare("INSERT INTO passwords_empresa (email, token, codigo) VALUES('$email','$token','$codigo')");
    
    $sql->execute();
    echo "Verifica tu correo para restablecer la contraseña";
}


