<!-- <?php

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


$sql2 = $connection->prepare("SELECT * FROM ofertas");
$sql2->execute();
$resp = $sql2->fetchAll(PDO::FETCH_ASSOC);
?> -->

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ofertas - <?php echo $res['nombre'] . " " . $res['apellido'] ?></title>
  <link rel="stylesheet" href="../css/buscar_ofertas.css" />
  <link rel="icon" href="../assets/img/Logo.png">


  <link rel="stylesheet" href="../css/menu.css">


</head>

<body>

  <?php include("../templates/menu.php"); ?>

  <header class="header">
    <div class="container_header">
      <div class="buscador">
        <a href="buscar.php">¿Qué empleo buscas?</a>
      </div>
    </div>
  </header>

  <section class="contenedor">
    <div class="titles">
      <h2>Últimas Ofertas Publicadas</h2>

      <?php foreach ($resp as $oferta) {   ?>

        <div class="busqueda">
          <span><?php echo $oferta['cargo'] . " - " . $oferta['titulo_oferta']  ?></span>
          <form action="previaOferta.php" method="post">
            <input name="id_oferta" type="hidden" value="<?php echo $oferta['id'] ?>">
            <input name="id_empresa" type="hidden" value="<?php echo $oferta['id_empresa'] ?>">


            <input type="submit" value="Ver">
          </form>
        </div>

      <?php } ?>

    </div>
  </section>

  <script src="../js/login.js"></script>


</body>

</html>