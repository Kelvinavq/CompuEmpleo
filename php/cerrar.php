<?php

session_start();
session_destroy();

echo '
<link rel="stylesheet" href="../css/modal.css" />

<div class="fondo modal_active ">
      <div class="modal">
        <div class="modal_icono">
          <img src="../assets/icons/correcto.png" />
        </div>

        <div class="modal_mensaje">
          <span>Sesión cerrada satisfactoriamente!</span>
        </div>
        
        <a class="btn_modal" href="../views/login.php">Aceptar</a>
      </div>
    </div>
    
';



?>


