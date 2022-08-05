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

    $id_oferta = $_POST['id_oferta'];

    // consultar postulaciones
    $post = $connection->prepare("SELECT * FROM postulados WHERE id_oferta = '$id_oferta'");
    $post->execute();
    $postulado = $post->fetchAll(PDO::FETCH_ASSOC);
    $contador = $post->rowCount();

    // consultar usuario postulados
    $usuario_postulado = $connection->prepare("SELECT postulados.id_usuario, postulados.id_oferta, postulados.estatus, ofertas.id, usuario.nombre, usuario.apellido, usuario.nivel_estudios, usuario.descripcion_perfil, usuario.estado FROM postulados INNER JOIN ofertas on postulados.id_oferta = ofertas.id INNER JOIN usuario on usuario.id = postulados.id_usuario WHERE postulados.id_oferta = '$id_oferta'");

    $usuario_postulado->execute();
    $usuario_post = $usuario_postulado->fetchAll(PDO::FETCH_ASSOC);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Postulados - <?php echo $resultado['nombre'] ?></title>
    <link rel="stylesheet" href="../css/empresa.css" />
    <link rel="icon" href="../assets/img/Logo.png">
    <link rel="stylesheet" href="../css/menu.css" />

</head>

<body>

    <?php
    include("../templates/menu_empresa.php")
    ?>

    <main>

        <?php

        ?>

        <div class="publicadas">
            <div class="titlee">

                <h2>Postulaciones actualmente</h2>
                <span><strong><?php echo $contador ?></strong> postulados</span>
            </div>

            <div class="contenedor_oferta">

                <?php foreach ($usuario_post as $info_post) { ?>
                    <div class="oferta">

                        <div class="title_oferta">
                            <div class="titulo">
                                <span><?php echo  $info_post['nombre'] . " "  . $info_post['apellido'] . " - " . $info_post['nivel_estudios'] ?></span>
                            </div>

                            <div class="enlace">
                                <form method="post" action="previaPerfilPostulado.php">
                                    <input type="hidden" name="id_usuario" value="<?php echo $info_post['id_usuario'] ?>">
                                    <input type="hidden" name="id_oferta" value="<?php echo $id_oferta ?>">
                                    <input type="submit" value="Ver">
                                </form>

                            </div>
                        </div>

                        <div class="descripcion">
                            <p>
                                <?php echo $info_post['descripcion_perfil'] ?>
                            </p>
                        </div>

                        <div class="sueldo">
                            <div class="info_sueldo">
                                <p>Estado: <strong><?php echo $info_post['estado'] ?></strong< /p>
                            </div>

                            <div class="info_sueldo">
                                <p>Estatus: <strong><?php echo $info_post['estatus'] ?></strong< /p>
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