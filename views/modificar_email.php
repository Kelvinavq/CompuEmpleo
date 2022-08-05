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
    $id = $res['id'];
}


if (isset($_POST['actual']) && isset($_POST['nuevo']) && isset($_POST['nuevo2'])) {

    $actual  = $_POST['actual'];
    $nuevo  = $_POST['nuevo'];
    $nuevo2  = $_POST['nuevo2'];
    $emailConfirmar = $res['email'];

    if ($actual == "" || $nuevo == "" || $nuevo2 == "") {
        echo '
<link rel="stylesheet" href="../css/modal.css" />

<div class="fondo modal_active ">
      <div class="modal">
        <div class="modal_icono">
          <img src="../assets/icons/incorrecto.png" />
        </div>

        <div class="modal_mensaje">
          <span>Error! campos vacios</span>
        </div>
        
        <a class="btn_modal" href="../views/modificar_email.php">Aceptar</a>
      </div>
    </div>
    
';
        die();
    } else {

        $sql2 = $connection->prepare("SELECT * FROM usuario WHERE id = '$id'");
        $sql2->execute();
        $resultado = $sql2->fetch(PDO::FETCH_LAZY);
        $passConfirmar = $resultado['email'];

        if ($actual == $emailConfirmar) {
            if ($nuevo == $nuevo2) {
                $sql = $connection->prepare("UPDATE usuario set email = '$nuevo2' WHERE id = '$id'");
                $sql->execute();
                echo '
                <link rel="stylesheet" href="../css/modal.css" />
                
                <div class="fondo modal_active ">
                      <div class="modal">
                        <div class="modal_icono">
                          <img src="../assets/icons/correcto.png" />
                        </div>
                
                        <div class="modal_mensaje">
                          <span>Se ha modificado satisfactoriamente!</span>
                        </div>
                        
                        <a class="btn_modal" href="../php/cerrar.php">Aceptar</a>
                      </div>
                    </div>
                    
                ';
            } else {
                echo '
                <link rel="stylesheet" href="../css/modal.css" />
                
                <div class="fondo modal_active ">
                      <div class="modal">
                        <div class="modal_icono">
                          <img src="../assets/icons/incorrecto.png" />
                        </div>
                
                        <div class="modal_mensaje">
                          <span>Error! los emails no coinciden</span>
                        </div>
                        
                        <a class="btn_modal" href="../views/modificar_email.php">Aceptar</a>
                      </div>
                    </div>
                    
                ';
            }
        }else{
            echo '
            <link rel="stylesheet" href="../css/modal.css" />
            
            <div class="fondo modal_active ">
                  <div class="modal">
                    <div class="modal_icono">
                      <img src="../assets/icons/incorrecto.png" />
                    </div>
            
                    <div class="modal_mensaje">
                      <span>Error! el email no es igual al registrado</span>
                    </div>
                    
                    <a class="btn_modal" href="../views/modificar_email.php">Aceptar</a>
                  </div>
                </div>
                
            ';
        }
    }
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modificar Email - <?php echo $res['nombre'] . " " . $res['apellido'] ?></title>
    <link rel="stylesheet" href="../css/editar_perfil.css" />
  <link rel="icon" href="../assets/img/Logo.png">

</head>

<body>
    <header>
        <a href="ajustes.php">
            < </a>
                <div class="textos">
                    <h2>Sobre ti</h2>
                    <span>Datos personales y de contacto</span>
                </div>
    </header>

    <main>
        <form method="POST" class="formulario_editar" >


            <div class="grupo_input">
                <label for="">E-mail Actual</label>
                <input type="email" name="actual">
            </div>

            <div class="grupo_input">
                <label for="">E-mail nuevo</label>
                <input type="email" name="nuevo">
            </div>

            <div class="grupo_input">
                <label for="">Confirmar E-mail</label>
                <input type="email" name="nuevo2">
            </div>

            <div class="grupo_input">
                <input type="submit" value="Guardar" />
            </div>
        </form>
    </main>
</body>

</html>