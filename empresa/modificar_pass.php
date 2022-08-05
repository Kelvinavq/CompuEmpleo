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


    $sql = $connection->prepare("SELECT * FROM empresa WHERE email = '$usuario'");
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_LAZY);
    $id = $res['id'];
}


if (isset($_POST['actual']) && isset($_POST['nueva']) && isset($_POST['nueva2'])) {

    $actual  = $_POST['actual'];
    $nueva  = $_POST['nueva'];
    $nueva2  = $_POST['nueva2'];
    $final = md5($nueva2);
    $actualmd5 = md5($actual);

    if ($actual == "" || $nueva == "" || $nueva2 == "") {
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
                
                <a class="btn_modal" href="../empresa/modificar_pass.php">Aceptar</a>
              </div>
            </div>
            
        ';
        die();
    } else {

        $sql2 = $connection->prepare("SELECT * FROM empresa WHERE id = '$id'");
        $sql2->execute();
        $resultado = $sql2->fetch(PDO::FETCH_LAZY);
        $passConfirmar = $resultado['pass'];

        if ($actualmd5 == $passConfirmar) {
            if ($nueva == $nueva2) {
                $sql = $connection->prepare("UPDATE empresa set pass = '$final' WHERE id = '$id'");
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
                        
                        <a class="btn_modal" href="../php_empresa/cerrar.php">Aceptar</a>
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
                          <span>Error! las contraseñas no coinciden</span>
                        </div>
                        
                        <a class="btn_modal" href="../empresa/modificar_pass.php">Aceptar</a>
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
                      <span>Error! la contraseña no es igual a la registrada</span>
                    </div>
                    
                    <a class="btn_modal" href="../empresa/modificar_pass.php">Aceptar</a>
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
    <title>Modificar Contraseña - <?php echo $res['nombre'] ?></title>
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
        <form method="POST">


            <div class="grupo_input">
                <label for="">Contraseña Actual</label>
                <input type="password" name="actual">
            </div>

            <div class="grupo_input">
                <label for="">Contraseña nueva</label>
                <input type="password" name="nueva">
            </div>

            <div class="grupo_input">
                <label for="">Confirmar Contraseña</label>
                <input type="password" name="nueva2">
            </div>

            <div class="grupo_input">
                <input type="submit" value="Guardar" />
            </div>
        </form>
    </main>
</body>

</html>