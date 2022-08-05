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


$codigo = $_POST['codigo'];
$email = $_POST['email'];
$token = $_POST['token'];

$sql = $connection->prepare("SELECT * FROM passwords WHERE email = '$email' AND token = '$token' AND codigo = '$codigo'");
$sql->execute();

$correcto = false;

if ($sql->rowCount() > 0) {

    $correcto = true;
} else {
    $correcto = false;

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

        <?php
        if ($correcto) { ?>

            <form  action="cambiarPass.php" method="post">
                <div class="grupo_input">
                    <input type="password" placeholder="Contraseña nueva" name="pass" id="password" />
                </div>

                <div class="grupo_input">
                    <input type="hidden" name="email" value="<?php echo $email ?>"/>
                </div>

                <div class="btn">
                    <input id="recuperar" type="submit" value="Recuperar Contraseña" />
                </div>
            </form>

        <?php } else {
            echo '
            <link rel="stylesheet" href="../css/modal.css" />
            
            <div class="fondo modal_active ">
                  <div class="modal">
                    <div class="modal_icono">
                      <img src="../assets/icons/incorrecto.png" />
                    </div>
            
                    <div class="modal_mensaje">
                      <span>Código incorrecto, intenta nuevamente!</span>
                    </div>
                    
                    <a class="btn_modal" href="../views/login.php">Aceptar</a>
                  </div>
                </div>
                
            ';
            
        } ?>


    


    </main>

    <script src="../js/login.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/validacion.js"></script>

</body>

</html>