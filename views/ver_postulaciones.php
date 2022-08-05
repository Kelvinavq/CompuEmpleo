<?php

include("../config/conexion.php");
session_start();

if (!isset($_SESSION['usuario'])) {

    echo "
  <script>
  alert('Debes iniciar sesion');
  window.location = 'index.php';
  </script>";

    session_destroy();
    die();
} else {

    $usuario = $_SESSION['usuario'];


    // consultar id_usuario
    $sql = $connection->prepare("SELECT * FROM usuario WHERE email = '$usuario'");
    $sql->execute();
    $consulta = $sql->fetch(PDO::FETCH_LAZY);
    $id_usuario = $consulta['id'];

    // consultar postulaciones del usuario
    $post = $connection->prepare("SELECT postulados.id_usuario, postulados.id_oferta, postulados.estatus, ofertas.id, ofertas.cargo, ofertas.titulo_oferta FROM postulados INNER JOIN ofertas on postulados.id_oferta = ofertas.id INNER JOIN usuario on usuario.id = postulados.id_usuario WHERE postulados.id_usuario = '$id_usuario'");
    $post->execute();

    $resp = $post->fetchAll(PDO::FETCH_ASSOC);
    $contador = $post->rowCount();



}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Postulaciones - <?php echo $consulta['nombre'] . " " . $consulta['apellido'] ?></title>
    <link rel="stylesheet" href="../css/buscar_ofertas.css" />

    <link rel="stylesheet" href="../css/menu.css" />
  <link rel="icon" href="../assets/img/Logo.png">


</head>

<body>

    <?php
    include("../templates/menu.php");
    ?>

<section class="contenedor">
    <div class="titles">
      <h2>Tus postulaciones</h2>
      <span class="contador">Numero de postulaciones: <strong><?php echo $contador ?></strong></span>

      <?php foreach ($resp as $postulacion) {   ?>

        <div class="busqueda">
          <span><?php echo $postulacion['cargo'] . " - " . $postulacion['titulo_oferta']  ?></span>
          
          <span>Estatus: <strong><?php echo $postulacion['estatus']?></strong></span>
        </div>

      <?php } ?>

    </div>
  </section>
</body>

<style>
    .busqueda{
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .contador{
        color: var(--blanco);
    }
</style>

<script src="../js/login.js"></script>

</html>