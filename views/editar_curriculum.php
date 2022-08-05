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
    $nombreUsuario = $res['nombre'];

    $sql2 = $connection->prepare("SELECT * FROM curriculums WHERE id_usuario = '$id'");
    $sql2->execute();
    $resultado = $sql2->fetch(PDO::FETCH_LAZY);


    if (filter_input(INPUT_POST, 'Actualizar')) {



        $curriculum = (isset($_FILES['curriculum']['name'])) ? $_FILES['curriculum']['name'] : "";


        $nombreArchivo = ($curriculum != "") ? $nombreUsuario . "_" . $_FILES['curriculum']['name'] : "defecto.pdf";
        $tmpcurriculum = $_FILES['curriculum']['tmp_name'];

        move_uploaded_file($tmpcurriculum, "../assets/curriculums/" . $nombreArchivo);

        $update2 = $connection->prepare("SELECT curriculum from curriculums WHERE id_usuario = '$id' ");
        $update2->execute();
        $consulta = $update2->fetch(PDO::FETCH_LAZY);

        if (isset($consulta['curriculum'])) {
            if (file_exists("../assets/curriculums/" . $consulta['curriculum'])) {
                unlink("../assets/curriculums/" . $consulta['curriculum']);
            }
        }

        $update = $connection->prepare("UPDATE curriculums set curriculum = '$nombreArchivo' WHERE id_usuario = '$id' ");
        $update->execute();
        echo '
<link rel="stylesheet" href="../css/modal.css" />

<div class="fondo modal_active ">
      <div class="modal">
        <div class="modal_icono">
          <img src="../assets/icons/correcto.png" />
        </div>

        <div class="modal_mensaje">
          <span>Se ha guardado satisfactoriamente!</span>
        </div>
        
        <a class="btn_modal" href="usuario.php">Aceptar</a>
      </div>
    </div>
    
';
        die();
    }


    if (filter_input(INPUT_POST, 'Guardar')) {

        $curriculum = (isset($_FILES['curriculum']['name'])) ? $_FILES['curriculum']['name'] : "";


        $nombreArchivo = ($curriculum != "") ? $nombreUsuario . "_" . $_FILES['curriculum']['name'] : "defecto.pdf";
        $tmpcurriculum = $_FILES['curriculum']['tmp_name'];

        if ($tmpcurriculum != "") {
            move_uploaded_file($tmpcurriculum, "../assets/curriculums/" . $nombreArchivo);
        }

        $insert = $connection->prepare("INSERT INTO curriculums (id_usuario, curriculum) VALUES('$id','$nombreArchivo')");
        $insert->execute();
        echo '
<link rel="stylesheet" href="../css/modal.css" />

<div class="fondo modal_active ">
      <div class="modal">
        <div class="modal_icono">
          <img src="../assets/icons/correcto.png" />
        </div>

        <div class="modal_mensaje">
          <span>Se ha actualizado satisfactoriamente!</span>
        </div>
        
        <a class="btn_modal" href="usuario.php">Aceptar</a>
      </div>
    </div>
    
';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Curriculum - <?php echo $res['nombre'] . " " . $res['apellido'] ?></title>
    <link rel="stylesheet" href="../css/editar_perfil.css" />
    <link rel="icon" href="../assets/img/Logo.png">


</head>

<body>
    <header>
        <a href="usuario.php">
            < </a>
                <div class="textos">
                    <h2>Sobre ti</h2>
                    <span>Datos personales y de contacto</span>
                </div>
    </header>

    <main>
        <form method="POST" class="formulario_editar" enctype="multipart/form-data">

            <div class="grupo_input">
                <label for="">Sube tu curriculum!</label>
                <input type="file" name="curriculum" ?>
            </div>

            <?php
            if ($sql2->rowCount() > 0) { ?>
                <div class="grupo_input">
                    <input type="submit" value="Actualizar" name="Actualizar" />
                </div>

            <?php } else { ?>

                <div class="grupo_input">
                    <input type="submit" value="Guardar" name="Guardar" />
                </div>
            <?php } ?>

        </form>


    </main>
</body>

</html>