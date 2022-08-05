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

$consulta = $connection->prepare("SELECT * FROM ofertas WHERE id_empresa = '$id'");
$consulta->execute();
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
$contador = $consulta->rowCount();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio - <?php echo $res['nombre'] ?></title>
    <link rel="stylesheet" href="../css/empresa.css" />
    <link rel="stylesheet" href="../css/menu.css" />
  <link rel="icon" href="../assets/img/Logo.png">


</head>

<body>

    <?php
    include("../templates/menu_empresa.php")
    ?>

    <main>
        <div class="publicar">
            <a href="nueva_oferta.php" class="publicar">Publicar Oferta</a>
        </div>

        <div class="publicadas">
            <div class="titlee">

                <h2>Últimas ofertas publicadas</h2>
                <span><strong><?php echo $contador ?></strong> ofertas publicadas</span>
            </div>

            <div class="contenedor_oferta">

                <?php foreach ($resultado as $oferta) { ?>
                    <div class="oferta">

                        <div class="title_oferta">
                            <div class="titulo">
                                <span><?php echo $oferta['cargo'] . " - "  . $oferta['titulo_oferta'] ?></span>
                            </div>

                            <div class="enlace">
                                <form method="post" action="editar_oferta.php">
                                    <input type="hidden" name="id_oferta" value="<?php echo $oferta['id'] ?>">
                                    <input type="submit" value="Editar">
                                </form>

                                <form method="post" action="../php_empresa/eliminar_oferta.php">
                                    <input type="hidden" name="id_oferta" value="<?php echo $oferta['id'] ?>">
                                    <input type="submit" value="Borrar">
                                </form>
                            </div>
                        </div>

                        <div class="descripcion">
                            <p>
                                <?php echo $oferta['descripcion'] ?>
                            </p>
                        </div>

                        <div class="sueldo">
                            <div class="info_sueldo">
                                <p><strong><?php echo $oferta['salario'] ?></strong> Netos mensuales</p>
                            </div>

                            <div class="enlace_postulaciones">
                                <form method="post" action="ver_postulados.php">
                                    <input type="hidden" name="id_oferta" value="<?php echo $oferta['id'] ?>">
                                    <input type="submit" value="Ver Postulados">
                                </form>
                            </div>
                        </div>
                    </div>

                <?php } ?>


            </div>
        </div>
    </main>
</body>

<script src="../js/login.js"></script>

</html>