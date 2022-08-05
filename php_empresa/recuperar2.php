<?php

include("../config/conexion.php");


session_start();




$usuario = $_SESSION['usuario'];

$sql = $connection->prepare("SELECT * FROM empresa WHERE email = '$usuario'");
$sql->execute();

$resultado = $sql->fetch(PDO::FETCH_LAZY);



if (isset($_GET['email']) && isset($_GET['token'])) {
  $email = $_GET['email'];
  $token = $_GET['token'];
} else {
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restablecer - <?php echo $resultado['nombre'] ?></title>
  <link rel="stylesheet" href="../css/recuperar.css" />
  <link rel="icon" href="../assets/img/Logo.png">
</head>

<body>
  <div class="spin">
    <div class="spinner"></div>
  </div>

  <header>
    <h1>CompuEmpleo</h1>
  </header>

  <main>
    <div class="foto">
      <img src="../assets/logo_empresa/<?php echo $resultado['logo'] ?>" alt="">
    </div>

    <div class="bienvenido">
      <h2>Bienvenido de nuevo <?php echo $resultado['nombre'] ?></h2>

    </div>

    <form action="../php_empresa/verificarToken.php" method="post">
      <div class="grupo_input">
        <input type="number" placeholder="Ingresa el codidgo de 4 digitos" name="codigo" />
      </div>

      <div class="grupo_input">
        <input type="hidden" value="<?php echo $email    ?>" name="email" />
      </div>

      <div class="grupo_input">
        <input type="hidden" value="<?php echo $token    ?>" name="token" />
      </div>


      <div class="btn">
        <input type="submit" value="Recuperar Contraseña" />
      </div>
    </form>
  </main>

  <script src="../js/login.js"></script>
</body>

</html>