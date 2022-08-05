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


?> -->

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar - <?php echo $res['nombre'] . " " . $res['apellido'] ?></title>
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="stylesheet" href="../css/buscar.css">
  <script src="../js/jquery.min.js"></script>
  <link rel="icon" href="../assets/img/Logo.png">


</head>

<body>

  <?php include("../templates/menu.php"); ?>
  <main>
    <div class="nav">
      <div class="opcion uno active" id="uno">
        <a href="">Empleos</a>
      </div>

    </div>
  </main>

  <div class="filtro empleos active">
    <form class="formulario_editar" action="resultado_busqueda.php" method="POST">
      <div class="grupo_input">
        <label>Qué empleo buscas ?</label>
        <input type="text" id="cargo" name="cargo" placeholder="Cargo o Categoría" />
        <div id="cargo_list" class="cargo_list">

        </div>

      </div>

      <div class="grupo_input">
        <input type="submit" value="Buscar Empleo" />
      </div>
    </form>
  </div>

 
  <script src="../js/login.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/buscar.js"></script>



</body>

</html>

<script>

</script>