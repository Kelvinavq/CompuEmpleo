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
  
    $resultado = $sql->fetch(PDO::FETCH_LAZY);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajustes - <?php echo $resultado['nombre'] ?></title>
    <link rel="stylesheet" href="../css/ajustes.css" />
  <link rel="icon" href="../assets/img/Logo.png">

</head>

<body>
    <header>
        <a href="empresa.php">
            < </a>
                <div class="textos">
                    <h2>Configuración</h2>
                    <span>Modificar datos de la cuenta</span>
                </div>
    </header>

    <main>

        <div class="contenedor">
            <label>Modificar e-mail y contraseña</label>

            <div class="enlaces">
                <div class="enlace">
                    <a href="../empresa/modificar_email.php">
                        Modificar e-mail
                    </a>
                    <span class="flecha">
                        >
                    </span>
                </div>

                <div class="enlace">
                    <a href="../empresa/modificar_pass.php">
                        Modificar contraseña
                    </a>
                    <span class="flecha">
                        >
                    </span>
                </div>

            </div>
        </div>

        <div class="contenedor">
            <label>Datos de la empresa</label>

            <div class="enlaces">
                <div class="enlace">
                    <a href="../empresa/modificar_datos.php">
                        Modificar
                    </a>
                    <span class="flecha">
                        >
                    </span>
                </div>
            </div>
        </div>

        <div class="contenedor">
            <label>Otras opciones</label>

            <div class="enlaces">
                <div class="enlace">
                    <a href="../php_empresa/cerrar.php">
                        Cerrar Sesión
                    </a>
                    <span class="flecha">
                        >
                    </span>
                </div>
            </div>
        </div>

    </main>
</body>

</html>