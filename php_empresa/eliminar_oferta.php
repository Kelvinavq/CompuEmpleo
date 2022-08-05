<?php
include("../config/conexion.php");

if (isset($_POST['id_oferta'])) {
    $id_oferta = $_POST['id_oferta'];
    $sql = $connection->prepare("DELETE FROM ofertas WHERE id = '$id_oferta'");
    $sql->execute();

    echo '
    <link rel="stylesheet" href="../css/modal.css" />
    
    <div class="fondo modal_active ">
          <div class="modal">
            <div class="modal_icono">
              <img src="../assets/icons/correcto.png" />
            </div>
    
            <div class="modal_mensaje">
              <span>Se ha eliminado tu oferta satisfactoriamente!</span>
            </div>
            
            <a class="btn_modal" href="../empresa/empresa.php">Aceptar</a>
          </div>
        </div>
        
    ';
}
