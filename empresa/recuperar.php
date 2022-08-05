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

  $sql = $connection->prepare("SELECT * FROM empresa WHERE email = '$usuario'");
  $sql->execute();

  $resultado = $sql->fetch(PDO::FETCH_LAZY);


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
            <img src="../assets/logo_empresa/<?php echo $resultado['logo']?>" alt="">
        </div>

        <div class="bienvenido">
            <h2>Bienvenido de nuevo <?php echo $resultado['nombre']?></h2>
        </div>

        <form action="../php_empresa/restablecer.php" method="post">
            <div class="grupo_input">
              <input type="email" name="correo" placeholder="Ingresa tu correo"/>
            </div>

    
            <div class="btn">
              <input type="submit" value="Recuperar Contraseña" />
            </div>
          </form>
    </main>

    <script src="../js/login.js"></script>
  </body>
</html>
