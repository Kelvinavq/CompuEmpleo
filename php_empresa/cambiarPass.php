<?php
include("../config/conexion.php");

$email = $_POST["email"];
$pass = $_POST["pass"];
$pass2 = md5($pass);

$sql = $connection->prepare("UPDATE empresa set pass = '$pass2' WHERE email = '$email'");
$sql->execute();
echo '
<link rel="stylesheet" href="../css/modal.css" />

<div class="fondo modal_active ">
      <div class="modal">
        <div class="modal_icono">
          <img src="../assets/icons/correcto.png" />
        </div>

        <div class="modal_mensaje">
          <span>Contraseña actualizada satisfactoriamente!</span>
        </div>
        
        <a class="btn_modal" href="../empresa/login.php">Aceptar</a>
      </div>
    </div>
    
';
