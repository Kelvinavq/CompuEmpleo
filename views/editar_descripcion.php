 <?php

include("../config/conexion.php");
session_start();

if (!isset($_SESSION['usuario'])) {

  echo "
  <script>
  alert('Debes iniciar sesion');
  window.location = 'login.php';
  </script>";

  session_destroy();
  die();
} else {
  $usuario = $_SESSION['usuario'];


  $sql = $connection->prepare("SELECT * FROM usuario WHERE email = '$usuario'");
  $sql->execute();
  $res = $sql->fetch(PDO::FETCH_LAZY);
}


if(isset($_POST['descripcion_breve']) && isset($_POST['puesto_deseado'])){

$descripcion_breve = $_POST['descripcion_breve'];
$puesto_deseado = $_POST['puesto_deseado'];

$sql = $connection->prepare("UPDATE usuario SET  descripcion_perfil = '$descripcion_breve', puesto_deseado = '$puesto_deseado' WHERE email = '$usuario'");

$sql->execute();

echo '
<link rel="stylesheet" href="../css/modal.css" />

<div class="fondo modal_active ">
      <div class="modal">
        <div class="modal_icono">
          <img src="../assets/icons/correcto.png" />
        </div>

        <div class="modal_mensaje">
          <span>Se ha actualizado satisfactoriamente!</span>
        </div>
        
        <a class="btn_modal" href="usuario.php">Aceptar</a>
      </div>
    </div>
    
';
}

?> 

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Descripcion - <?php echo $res['nombre'] . " " . $res['apellido'] ?></title>
    <link rel="stylesheet" href="../css/editar_perfil.css" />
    <link rel="icon" href="../assets/img/Logo.png">


  </head>
  <body>
    <header>
        <a href="usuario.php"><</a>
      <div class="textos">
        <h2>Sobre ti</h2>
        <span>Datos personales y de contacto</span>
      </div>
    </header>

    <main>
      <form method="POST" class="formulario_editar" >


      <div class="grupo_input">
          <label for="">Puesto deseado</label>
            <input type="text" name="puesto_deseado" value="<?php echo $res['puesto_deseado'] ?>">
        </div>

        <div class="grupo_input">
          <label for="">Descripcion breve de tu perfil profesional</label>
          <textarea name="descripcion_breve" id="" cols="30" rows="10"><?php echo $res['descripcion_perfil'] ?></textarea>
        </div>

        <div class="grupo_input">
          <input type="submit" value="Guardar" />
        </div>
      </form>
    </main>
  </body>
</html>
