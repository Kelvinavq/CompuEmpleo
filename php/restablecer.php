<?php

include("../config/conexion.php");

$email = $_POST['correo'];
$bytes = random_bytes(5);
$token = bin2hex($bytes);

include("mail_reset.php");

if ($enviado) {

    $sql = $connection->prepare("INSERT INTO passwords (email, token, codigo) VALUES('$email','$token','$codigo')");
    
    $sql->execute();
    echo '
    <link rel="stylesheet" href="../css/modal.css" />
    
    <div class="fondo modal_active ">
          <div class="modal">
            <div class="modal_icono">
              <img src="../assets/icons/correcto.png" />
            </div>
    
            <div class="modal_mensaje">
              <span>Se ha enviado un email a tu bandeja de entrada, entra el enlace!</span>
            </div>
            
            <a class="btn_modal" href="../index.php">Aceptar</a>
          </div>
        </div>
        
    ';
}


