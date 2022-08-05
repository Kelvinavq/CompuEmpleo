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

}else{

  $usuario = $_SESSION['usuario'];

  $sql = $connection->prepare("SELECT * FROM usuario WHERE email = '$usuario'");
  $sql->execute();

  $resultado = $sql->fetch(PDO::FETCH_LAZY);


}

if (isset($_GET['email']) && isset($_GET['token'])) {
  $email = $_GET['email'];
  $token = $_GET['token'];

}else{
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restablecer - <?php echo $resultado['nombre'] . " " . $resultado['apellido'] ?></title>
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
        <img src="../assets/profile/<?php echo $resultado['foto']?>" alt="">

        </div>

        <div class="bienvenido">
            <h2>Bienvenido de nuevo Kelvin</h2>
        </div>

        <form  action="../php/verificarToken.php" method="post">
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
