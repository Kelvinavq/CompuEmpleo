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



    // eliminar conocimiento
    $sql2 = $connection->prepare("SELECT * FROM conocimientos WHERE id_usuario = '$id'");
    $sql2->execute();
    $conocimiento = $sql2->fetchAll(PDO::FETCH_ASSOC);


    if (isset($_POST['eliminar_conocimiento'])) {

        $eliminar_conocimiento = $_POST['eliminar_conocimiento'];
        $eliminar = $connection->prepare("DELETE FROM conocimientos WHERE id = '$eliminar_conocimiento'");
        $eliminar->execute();

        if ($eliminar->rowCount() >= 0) {
            header("location: usuario.php");
        }
    }


    // eliminar idiomas
    $sql3 = $connection->prepare("SELECT * FROM idiomas WHERE id_usuario = '$id'");
    $sql3->execute();
    $idiomas = $sql3->fetchAll(PDO::FETCH_ASSOC);


    if (isset($_POST['eliminar_idioma'])) {

        $eliminar_idioma = $_POST['eliminar_idioma'];
        $eliminar_idi = $connection->prepare("DELETE FROM idiomas WHERE id = '$eliminar_idioma'");
        $eliminar_idi->execute();

        if ($eliminar_idi->rowCount() >= 0) {
            header("location: usuario.php");
        }
    }

    // consultar curriculum
    $curriculum = $connection->prepare("SELECT * FROM curriculums WHERE id_usuario = '$id'");
    $curriculum->execute();
    $curr = $curriculum->fetch(PDO::FETCH_LAZY);
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - <?php echo $res['nombre'] . " " . $res['apellido'] ?></title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/usuario.css">
  <link rel="icon" href="../assets/img/Logo.png">


</head>

<body>

    <?php include("../templates/menu.php"); ?>
    <header>
        <div class="btn_salir">
            <a href="usuario.php" class="salir">X</a>
        </div>

        <div class="foto">
            <img src="../assets/profile/<?php echo $res['foto'] ?>" />

        </div>
        <div class="textos">
            <h2><?php echo $res['nombre'] . " " . $res['apellido'] ?></h2>
            <span><?php echo $res['estado'] ?></span>
        </div>


        <div class="contacto">
            <span><?php echo $res['email'] ?></span>
            <span><?php echo $res['telefono'] ?></span>
        </div>
    </header>

    <main>
        <div class="contenedor">
            <div class="title_editar">
                <h2><?php echo $res['puesto_deseado'] ?></h2>
            </div>

            <div class="texto">
                <p>
                    <?php echo $res['descripcion_perfil'] ?>
                </p>
            </div>
        </div>


        <div class="contenedor">
            <div class="title_editar">
                <h2>Mis Estudios</h2>
            </div>

            <div class="texto1">
                <h2><?php echo $res['nivel_estudios'] ?></h2>
            </div>
            <div class="texto2">
                <span><?php echo $res['centro_educativo'] ?></span>
            </div>
        </div>

        <div class="contenedor">
            <div class="title_editar">
                <h2>Conocimientos</h2>
            </div>

            <div class="opciones">
                <?php foreach ($conocimiento as $con) { ?>
                    <div class="opcion">
                        <span><?php echo $con['descripcion'] ?></span>
                        <form method="POST">
                            <input class="eliminar" name="eliminar_conocimiento" type="hidden" value="<?php echo $con['id'] ?>">
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="contenedor">
            <div class="title_editar">
                <h2>Idiomas</h2>
            </div>

            <div class="opciones">
                <?php foreach ($idiomas as $idi) { ?>
                    <div class="opcion">
                        <span><?php echo $idi['idioma'] ?></span>
                        <form method="POST">
                            <input class="eliminar" name="eliminar_idioma" type="hidden" value="<?php echo $idi['id'] ?>">
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="contenedor">
            <div class="title_editar">
                <h2>Curriculum</h2>
            </div>

            <div class="opciones">
                <div class="opcion">
                    <span><?php

                            if ($curriculum->rowCount() > 0) {

                            ?>
                            <a class="enlace_curr" target="_blank" href="../assets/curriculums/<?php echo $curr['curriculum']; ?>">Abrir <?php echo $curr['curriculum']; ?></a>
                        <?php

                            } else {
                                echo $res['nombre'] . " Aún no has subido tu curriculum!";
                            }
                        ?></span>
                </div>
            </div>
        </div>
    </main>

    <script src="../js/login.js"></script>
</body>

</html>
